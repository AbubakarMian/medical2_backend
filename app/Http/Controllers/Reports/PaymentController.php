<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\libraries\ExportToExcel;
use App\Model\Payment;
use App\Models\Request as ModelsRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;
use Stripe;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $all = Config::get('constants.order_status.all');
        $pending = Config::get('constants.order_status.pending');
        // $inprogress = Config::get('constants.order_status.inprogress');
        $completed = Config::get('constants.order_status.completed');
        $rejected = Config::get('constants.order_status.rejected');

        $search_text = $request->payment_id ?? '';
        $search_payment = $search_text;
        $date = $request->date;
        $status = $request->status ?? $all;

        $status_arr = [
            $all => ucwords($all),
            $pending => ucwords($pending),
            // $inprogress=>ucwords($inprogress) ,
            $completed => ucwords($completed),
            $rejected => ucwords($rejected)
        ];
        if (!$date) {
            $fromdate = Carbon::now()->subDay()->format('m/d/Y');
            $todate = Carbon::now()->format('m/d/Y');
            $date = $fromdate . ' - ' . $todate;
        }
        $fromdate = Carbon::now()->subDay()->format('m/d/Y');
        $todate = Carbon::now()->format('m/d/Y');
        $date = $fromdate . ' - ' . $todate;

        $payments = $this->query($search_text, $date, $status)->select('*')->paginate(10);
        // dd($payments);
        // $orders = ModelsRequest::paginate(5);
        return view('admin.reports.payment.index', compact(
            'payments',
            'search_text',
            'status_arr',
            'status',
            'date',
            'search_payment'
        ));
    }



    public function query($search_text, $date, $status)
    {

        // dd($status);
        $datearr = explode(' - ', $date);
        $fromdate = date("m/d/Y H:i:s", strtotime(str_replace('-', '/', $datearr[0])));
        $todate = date("m/d/Y H:i:s", strtotime(str_replace('-', '/', $datearr[1])));

        $report = Payment::with('user', 'student')
            ->whereRaw(
                '(date(created_at))>= ?',
                [date('Y-m-d H:i:s', strtotime($fromdate))]
            )
            ->whereRaw(
                '(date(created_at))<= ?',
                [date('Y-m-d H:i:s', strtotime($todate))]
            );

        $report = $report->where(function ($s) use ($search_text) {
            return $s->whereHas('user', function ($u) use ($search_text) {
                return $u->where('name', 'like', '%' . $search_text . '%');
            });
        });

        // dd($report);

        if (strtolower($status) != 'all') {
            $report = $report->where('status', $status);
        }
        $report = $report->orderBy('created_at', 'desc');
        return $report;
    }

    public function status_update(Request $request, $id)
    {

        $modelRequest = Payment::find($id);
        $modelRequest->status = $request->status;
        $modelRequest->save();

        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.update'),
            'new_value' => ucwords($request->status)
        ]);
        return $response;
    }
    // 
    public function payment_refund(Request $request, $id)
    {

        $payment_object = Payment::find($id);
        $stripe = new \Stripe\StripeClient(
            Config::get('services.stripe.STRIPE_SECRET')
        );
        $charges = $stripe->refunds->create([
            'charge' => $payment_object->payment_id,
            'amount' => $request->payment_refund_amount,
        ]);
        $payment_refund_amount = $request->payment_refund_amount;
        // dd(  $payment_refund_amount);

        // $url = 'https://api.stripe.com/v1/refunds';
        // $method = 'POST';
        // $headers = array(
        //     "Content-Type:application/x-www-form-urlencoded",
        //     'Accept: application/json',
        //     'Authorization: Bearer sk_test_51HWGI7AEX4dqjMHKn3tpx0BSgLaWareo5dZ7zSBQjLnlsx4XBmGNflMxYc7SJsaNUsZQcrsHKOMPCIZFiy2xv77g00ndxNeFTs',
        // );
        // $body = '{
        //     "charge":"ch_3MCmN0AEX4dqjMHK0HUBwVAx",
        //     "amount":"'.$payment_refund_amount
        //     .'"}';
        // // 
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_URL => $url,
        //     CURLOPT_CUSTOMREQUEST => $method,
        //     CURLOPT_HTTPHEADER => $headers,
        //     CURLOPT_POSTFIELDS => $body
        // ));

        // $my_response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        //   payment_refund
    //     $payment = new Payment();
    //     $payment->user_id =  $old_payment->user_id;
    //     $payment->payment_id = $stripe->id;
    //     $payment->course_register_id = $old_payment->course_register_id;
    //     $payment->payment_response = json_encode($stripe);
    //     $payment->payment_status = $stripe->status;
    //     $payment->card_type = $stripe->payment_method_details->card->brand;
    //     $payment->amount =   $request->payment_refund_amount;
    //     $payment->save();
    //     //   payment_refund
    //     $old_payment->action  = 'payment_refund';
    //     $old_payment->refund_payment_id  = $payment->id;
    //     $old_payment->save();

        $response = Response::json([
            'action' => Config::get('constants.ajax_action.update'),
            'new_value' => ucwords($request->status),
            'payment_refund_amount' => $payment_refund_amount,
            'charge' => $charges,
        ]);
        return $response;
    }

    // 

    public function index_excel(Request $request)
    {
        $all = Config::get('constants.order_status.all');
        // $search_text = $request->user_excel;
        $search_text = $request->user_excel ?? '';

        $date = $request->date_excel;
        $status = $request->status_excel ?? $all;

        if (!$date) {
            $fromdate = Carbon::now()->subDay()->format('m/d/Y');
            $todate = Carbon::now()->format('m/d/Y');
            $date = $fromdate . ' - ' . $todate;
        }
        $data = $this->query($search_text, $date, $status)->get(); //->toArray();
        // dd($this->query($search_text, $date, $status));
        $excel_arr = [];


        foreach ($data as $key => $payment) {
            $request = $payment->request;


            $excel_arr[] = [
                $payment->created_at,
                $payment->payment_id,
                $payment->user->name,
                $payment->user->email,

                $payment->price,
                $payment->payment_status,
                // $request->request_item_price ??'',




            ];

            // $excel_arr[] = [
            //     '',
            //     '',
            //     '',
            //     '',
            //     '',
            //     '',
            //     '',
            //     '',
            //     '',
            //     '',
            //     '',
            //     '',
            //     '',
            //     $item->product->name,

            //     $item->unit_price,
            //     $item->quantity,
            //     $item->final_price,

            // ];
        }

        $headings = [
            'Date', 'Payment Id', 'Customer', 'Email', 'Amount',
            'Payment Status',
            // 'Product', 'Unit Price', 'Quantity', 'Price',
        ];
        $export_data = new ExportToExcel($headings, $excel_arr);
        $excel = Excel::download($export_data, 'payments.xlsx');
        return $excel;
    }
}
