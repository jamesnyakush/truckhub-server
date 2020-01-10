<?php

namespace App\Http\Controllers\Api\v1\truck;

use Illuminate\Http\Request;
use App\Model\v1\truck\Truck;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::all();

        return response()->json([
            'message' => 'successfully fetched',
            'trucks' => $trucks
        ]);
    }

    public function store(Request $request)
    {
        $truck = new Truck([
            'manufacturer' => $request->manufacturer,
            'fuel'         => $request->fuel,
            'capacity'     => $request->capacity,
            'tonnage'      => $request->tonnage,
            'price'        => $request->price,
            'transmission' => $request->transmission
        ]);

        $truck->save();

        return response()->json([
            'isSuccessful' => true,
            'message'      => 'Added Succesfully',
            'truck'        => $truck
        ],Response::HTTP_CREATED);
    }

    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
        
    }
}
