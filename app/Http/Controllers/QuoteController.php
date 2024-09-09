<?php

namespace App\Http\Controllers;

use App\Services\FedExService;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    protected $fedExService;

    public function __construct(FedExService $fedExService)
    {
        $this->fedExService = $fedExService;
    }

    public function retrieveShipments()
    {
        $countries = Country::all();
        return view('mainpage.home', compact('countries'));
    }

    public function getToken(Request $request){
        $this->fedExService->getAuthToken();
    }


//     public function shipment(Request $request)
// {
//     // Retrieve form data
//     $fromCountry = $request->input('fromCountry');
//     $toCountry = $request->input('toCountry');
//     $fromZip = $request->input('zipcodeFrom');
//     $toZip = $request->input('zipcodeTo');
//     $weight = $request->input('weight');
//     $length = $request->input('length');
//     $width = $request->input('width');
//     $height = $request->input('height');

//     // Call FedEx service
//     $rates = $this->fedExService->getRates($fromCountry, $fromZip, $toCountry, $toZip, $weight, $length, $width, $height);

//     // Return view with rates data
//     return view('shipments.shipment', compact('rates'));
// }

// public function getShippingRates(Request $request)
// {
//     try {
//         $fromCountry = 'US';
//         $toCountry = 'CA';
//         $weight = 5; // lbs or kg
//         $dimensions = [
//             'length' => 10,
//             'width' => 10,
//             'height' => 5,
//         ];

//         // Call FedEx service
//         $rates = $this->fedExService->getRates($fromCountry, $toCountry, $weight, $dimensions);

//         return response()->json($rates);

//     } catch (\Exception $e) {
//         return response()->json([
//             'error' => $e->getMessage(),
//         ], 500);
//     }
// }


}
