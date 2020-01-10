<?php

namespace App\Http\Controllers\Api\v1\booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\booking\BookingRequest;
use App\Http\Resources\v1\booking\BookingCollection;
use App\Http\Resources\v1\booking\BookingResource;
use App\Model\v1\booking\Booking;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{

    
    public function index()
    {
        $bookings = BookingCollection::collection(Booking::all());

        return response()->json([
            'isSuccessful' => true,
            'message' => 'successfull',
            'bookings'=>$bookings
        ],Response::HTTP_OK);
    }

    public function store(BookingRequest $request)
    {
        if($request->validated()){
            $bookings = new Booking([
                'start_date' => $request->start_date,
                'end_date'   => $request->end_date,
                'trucks_id' => $request->trucks_id
            ]);
    
            $bookings->save();

            return response()->json([
                'isSuccessful' => true,
                'message' => 'successfull',
                'bookings' =>new BookingResource($bookings) 
            ],Response::HTTP_CREATED);
        }else{
            echo "false";
        }  
    }

    public function show(Booking $booking)
    {
        return response()->json([
            'message'  => 'Booking successfully updated',
            'booking'  => new BookingResource($booking)
        ], Response::HTTP_OK);
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());

        return response()->json([
            'message'  => 'Booking successfully updated',
            'booking'  => new BookingResource($booking)
        ], Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        Booking::where('id',$id)->delete();
        return [
            'message' => 'Building Deleted'
        ];
        
    }
}
