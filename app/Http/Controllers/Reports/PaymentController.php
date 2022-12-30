<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\libraries\ExportToExcel;
use App\Model\Payment;
use App\Model\Student_fees;
use App\Models\Request as ModelsRequest;
use Carbon\Carbon;
use App\Mail\Refund as RefundMail;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;
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
        $report = Payment::with('user','course');
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

        $payment_refund_ids = $payment_object->refund_payment_id;
        //   payment_refund
        $payment = new Payment();
        $payment->user_id =  $payment_object->user_id;
        $payment->payment_id = $stripe->id;
        $payment->course_id = $payment_object->course_id;
        $payment->payment_response = json_encode($stripe);
        $payment->payment_status = $stripe->status;
        // $payment->card_type = ;
        $payment->amount =   $stripe->amount;
        $payment->reason =   $request->payment_refund_reason;
        $payment->action  = $stripe->object;
        $payment->save();
    //     //   payment_refund

        $payment_refund_ids[] = $payment->id;
        $payment_object->refund_payment_id  = $payment_refund_ids;
        $payment_object->save();

        $user = User::find($payment_object->user_id);
        $payment = Payment::first();
        $emails = Config::get('constants.admin_emails');
        $emails[] = $user->email;
        if(!strpos(url()->current(),'localhost')){//=== true)
            foreach($emails as $email){
                $details = [
                    // 'to' => $email,
                    'to' => $email,
                    'title' =>  'Amount Refund Success',
                    'subject' =>  'Refund',
                    'email_body'=>'Your amount refunded successfully',
                    'from' => 'contactus@medical2.com',
                    'payment' => $payment,
                    "dated"  => date('d F, Y (l)'),
                ];
                // Mail::to($email)->send(new RefundMail($details));
                Mail::to($email)->send(new RefundMail($details));
            }
        }

        // if(!strpos(url()->current(),'localhost')){//=== true) bohat achi bat
        //         $details = [
        //             // 'to' => $email,
        //             'to' => $emails,
        //             'title' =>  'Amount Refund Success',
        //             'subject' =>  'Refund',
        //             'email_body'=>'Your amount refunded successfully',
        //             'from' => 'contactus@medical2.com',
        //             'payment' => $payment,
        //             "dated"  => date('d F, Y (l)'),
        //         ];
        //         Mail::to($emails)->send(new RefundMail($details));
        //     }


        return $this->sendResponse(200,$payment);
    }

    public function payment_refund_details($payment_id){
        $payment = Payment::find($payment_id);
        $refund_payments = Payment::whereIn('id', $payment->refund_payment_id)->get();
        return $this->sendResponse(200, $refund_payments);
    }
}
