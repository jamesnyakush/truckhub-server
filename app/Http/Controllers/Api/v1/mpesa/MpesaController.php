<?php

namespace App\Http\Controllers\Api\v1\mpesa;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\v1\mpesa\Mpesa;
use App\Http\Controllers\Controller;
use SmoDav\Mpesa\Laravel\Facades\STK;
use SmoDav\Mpesa\Laravel\Facades\Registrar;


class MpesaController extends Controller
{

    protected $hash = 'jvmJpbrZ6nfAyb8UToGVLdhychBYcYTH';

    public function register()
    {
        $confirmation = 'https://54ce2a97.ngrok.io/api/payment/confirm';
        $validation = 'https://54ce2a97.ngrok.io/api/payment/validate';
        $response = Registrar::register(600000)
            ->onConfirmation($confirmation)
            ->onValidation($validation)
            ->submit();
        return response()->json($response);
    }

    public function pay()
    {
        $response = STK::request(1)
        ->from(254746445198)
        ->usingReference('Some Reference', 'Test Payment')
        ->push();

        return response()->json([
            'response' => $response
        ]);
    }

    public function validateTransaction(Request $request)
    {

        $transaction = $this->createTransaction($request);
        return $this->successfulResponse($transaction);
    }
  
    public function confirmTransaction(Request $request)
    {
        if ($transaction = Mpesa::find($request->get('ThirdPartyTransID'))) {
            $transaction->update(['status' => Mpesa::STATUS_COMPLETE]);
            return $this->successfulResponse($transaction);
        }
  
        $transaction = $this->createTransaction($request, Mpesa::STATUS_COMPLETE);
        return $this->successfulResponse($transaction);
    }

    protected function createTransaction(Request $request, $status = Mpesa::STATUS_PENDING)
    {
        return Mpesa::create([
            // 'invoice_id' => $invoice->id,
            'transaction_number' => $request->get('TransID'),
            'transaction_time' => Carbon::parse($request->get('TransTime', null)),
            'amount' => $request->get('TransAmount'),
            'short_code' => $request->get('BusinessShortCode'),
            'bill_reference' => $request->get('BillRefNumber'),
            'mobile_number' => $request->get('MSISDN'),
            'payer_first_name' => $request->get('FirstName'),
            'payer_middle_name' => $request->get('MiddleName'),
            'payer_last_name' => $request->get('LastName'),
            'status' => $status,
        ]);
    }
 
    protected function successfulResponse(Mpesa $transaction)
    {
        return response()->json([
            'ResultCode' => 0,
            'ResultDesc' => 'The service was accepted successfully',
            'ThirdPartyTransID' => $transaction->id
        ]);
    }

    protected function invalidInvoiceNumberResponse()
    {
        return response()->json([
            'ResultCode' => 1,
            'ResultDesc' => 'The provided invoice number does not exist.',
            'ThirdPartyTransID' => 0
        ]);
    }
    

  
}
