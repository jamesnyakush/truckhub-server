<?php

namespace App\Http\Controllers\Api\v1\payment;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use App\Model\v1\mpesa\Mpesa;
use Kreait\Firebase\ServiceAccount;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function index()
    {
      $payment = Mpesa::all();

      return response()->json([
        'message' => 'These are the payment',
        'payments' => $payment

      ],Response::HTTP_OK);
    
    }

    public function store(Request $request)
    {
        
    }


    public function pay()
    {
        // $response = Simulate::request(1)
        //     ->from(254723722363)
        //     ->usingReference('fakeInvoice')
        //     ->setCommand('CustomerPayBillOnline')
        //     ->push();

        $response = STK::request(10)
            ->from(254723722363)
            ->usingReference('Some Reference', 'Test Payment')
            ->setCommand('CustomerBuyGoodsOnline') 
            ->push();

        notification($deviceToken,$title,$message);

        return response()->json([
            'response' => $response
        ]);
    }



    public function notification($deviceToken,$title,$message)
    {
      $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'../google.json');
  
      $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://fcmfirebaseproject-3d849.firebaseio.com')
        ->create();
      
      $messaging = $firebase->getMessaging();
            
      $notification = Notification::create($title, $message);
      
      $message = CloudMessage::withTarget('token', $deviceToken)
           ->withNotificatibookingon($notification);
  
      $messaging->send($message);
    }
  
}
