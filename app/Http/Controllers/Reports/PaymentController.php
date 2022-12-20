<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\libraries\ExportToExcel;
use App\Model\Payment;
use App\Model\Student_fees;
use App\Models\Request as ModelsRequest;
use Carbon\Carbon;
use App\Mail\Refund as RefundMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.reports.payment.index');
    }

    public function get_payment_report(Request $request ){

        // $student_fees = $this->query($search_text, $date, $status)->select('*')->get();
        $student_fees = $this->query($request)->select('*')->get();
        $res = new \stdClass();
        $res->status = true;
        $res->data = $student_fees;
         echo json_encode($res);
    }

    public function query(Request $request)
    {
        // $report = Student_fees::with('user','course','payment');
        $report = Payment::with('user','course','refund_payments');
        $report = $report->orderBy('created_at', 'desc');
        return $report;
    }
    public function payment_refund(Request $request, $id)
    {

        $payment_object = Payment::find($id);
        // dd($id,$payment_object->payment_id);
        $stripe_set_client = new \Stripe\StripeClient(
            Config::get('services.stripe.STRIPE_SECRET')
        );
        $stripe = $stripe_set_client->refunds->create([
            'charge' => $payment_object->payment_id,
            'amount' => $request->payment_refund_amount,
        ]);

        $payment_refund_amount = $request->payment_refund_amount;

        //   payment_refund
        $payment = new Payment();
        $payment->user_id =  $payment_object->user_id;
        $payment->payment_id = $stripe->id;
        $payment->course_id = $payment_object->course_id;
        $payment->payment_response = json_encode($stripe);
        $payment->payment_status = $stripe->status;
        // $payment->card_type = ;
        $payment->amount =   $stripe->amount;
        $payment->reason =   $stripe->payment_refund_reason;
        $payment->action  = $stripe->object;
        $payment->save();
    //     //   payment_refund
        $payment_object->refund_payment_id  = $payment->id;
        $payment_object->save();

        $response = Response::json([
            'action' => Config::get('constants.ajax_action.update'),
            'new_value' => ucwords($request->status),
            'payment_refund_amount' => $payment_refund_amount,
            // 'charge' => $charges,
        ]);
        $payment = Payment::first();
        $details = [
            'to' => 'ameer.maavia@gmail.com',
            // 'to' => 'abubakrmianmamoon@gmail.com',
            // 'to' => 'info@medical2.com',
            'title' =>  'Amount Refund Success',
            'subject' =>  'Refund',
            'email_body'=>'Your amount refunded successfully',
            'from' => 'contactus@medical2.com',
            'payment' => $payment,
            "dated"  => date('d F, Y (l)'),
        ];

        Mail::to('ameer.maavia@gmail.com')->send(new RefundMail($details));
        return $response;
    }

}
