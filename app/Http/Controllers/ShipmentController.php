<?php

namespace App\Http\Controllers;

use App\Services\FedExService;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    protected $fedExService;

    public function __construct(FedExService $fedExService)
    {
        $this->fedExService = $fedExService;
    }

    public function shipment()
    {
        // Get all shipments from the FedEx API
        $shipments = $this->fedExService->getAllShipments();

        // You can return this to a view
        return view('shipments.shipment', compact('shipments'));

        // Alternatively, if it's an API, you can return it as JSON
        // return response()->json($shipments);
    }

    public function trackShipment(Request $request)
    {
        // Retrieve form data
        $fromCountry = $request->input('from_country');
        $toCountry = $request->input('to_country');
        $fromZip = $request->input('zipcodeFrom');
        $toZip = $request->input('zipcodeTo');
        $weight = $request->input('weight');
        $length = $request->input('length');
        $width = $request->input('width');
        $height = $request->input('height');

        // Call FedEx tracking API (you might need to adjust this based on the FedEx API you're using)
        $trackingResult = $this->fedExService->trackShipment($fromCountry, $fromZip, $toCountry, $toZip, $weight, $length, $width, $height);

        // Handle the result and return a view or response
        return view('shipments.shipment', compact('trackingResult'));
    }
}
