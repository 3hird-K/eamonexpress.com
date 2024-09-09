<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FedExServices
{
    protected $key;
    protected $password;
    protected $accountNumber;
    protected $meterNumber;
    protected $isSandbox;

    public function __construct()
    {
        $this->key = env('FEDEX_KEY');
        $this->password = env('FEDEX_PASSWORD');
        $this->accountNumber = env('FEDEX_ACCOUNT_NUMBER');
        $this->meterNumber = env('FEDEX_METER_NUMBER');
        $this->isSandbox = env('FEDEX_SANDBOX') === 'true';
    }

    public function getAuthToken(){

        $endpoint = $this->isSandbox
            ? 'https://apis-sandbox.fedex.com/oauth/token'
            : 'https://apis.fedex.com/oauth/token';

        $response = Http::asForm()->post($endpoint, [
            'grant_type'    => 'client_credentials',
            'client_id'     => $this->key,
            'client_secret' => $this->password,
        ]);

        if ($response->successful()) {
            $tokenData = $response->json();
            $accessToken = $tokenData['access_token'];
            $tokenType = $tokenData['token_type']; // Should be 'Bearer'

            // Store the token somewhere (session, cache, etc.) for reuse
            dd( session(['fedex_access_token' => $accessToken]));
            session(['fedex_access_token' => $accessToken]);
        } else {
            throw new \Exception('Failed to retrieve FedEx OAuth token: ' . $response->body());
        }
    }


    // public function getRates($fromCountry, $fromZip, $toCountry, $toZip, $weight, $length, $width, $height)
    // {
    //     $endpoint = $this->isSandbox
    //         ? 'https://apis-sandbox.fedex.com/availability/v1/transittimes'
    //         : 'https://apis.fedex.com/availability/v1/transittimes';

    //     $authToken = $this->getAuthToken();

    //     if (!$authToken) {
    //         throw new \Exception('Failed to retrieve access token.');
    //     }

    //     $response = Http::withHeaders([
    //         'Content-Type' => 'application/json',
    //         'Authorization' => 'Bearer ' . $authToken,
    //         'x-locale' => 'en_US',
    //         'x-customer-transaction-id' => uniqid()
    //     ])->post($endpoint, [
    //         "requestedShipment" => [
    //             "shipper" => [
    //                 "address" => [
    //                     "postalCode" => $fromZip,
    //                     "countryCode" => $fromCountry
    //                 ]
    //             ],
    //             "recipients" => [
    //                 [
    //                     "address" => [
    //                         "postalCode" => $toZip,
    //                         "countryCode" => $toCountry
    //                     ]
    //                 ]
    //             ],
    //             "packagingType" => "YOUR_PACKAGING",
    //             "requestedPackageLineItems" => [
    //                 [
    //                     "weight" => [
    //                         "units" => "LB",
    //                         "value" => $weight
    //                     ],
    //                     "dimensions" => [
    //                         "length" => $length,
    //                         "width" => $width,
    //                         "height" => $height,
    //                         "units" => "IN"
    //                     ]
    //                 ]
    //             ]
    //         ],
    //         "carrierCodes" => [
    //             "FDXG"
    //         ]
    //     ]);

    //     if ($response->successful()) {
    //         return $response->json();
    //     } else {
    //         Log::error('FedEx Rate Request Failed', [
    //             'endpoint' => $endpoint,
    //             'headers' => $response->headers(),
    //             'body' => [
    //                 "requestedShipment" => [
    //                     "shipper" => [
    //                         "address" => [
    //                             "postalCode" => $fromZip,
    //                             "countryCode" => $fromCountry
    //                         ]
    //                     ],
    //                     "recipients" => [
    //                         [
    //                             "address" => [
    //                                 "postalCode" => $toZip,
    //                                 "countryCode" => $toCountry
    //                             ]
    //                         ]
    //                     ],
    //                     "packagingType" => "YOUR_PACKAGING",
    //                     "requestedPackageLineItems" => [
    //                         [
    //                             "weight" => [
    //                                 "units" => "LB",
    //                                 "value" => $weight
    //                             ],
    //                             "dimensions" => [
    //                                 "length" => $length,
    //                                 "width" => $width,
    //                                 "height" => $height,
    //                                 "units" => "IN"
    //                             ]
    //                         ]
    //                     ]
    //                 ],
    //                 "carrierCodes" => [
    //                     "FDXG"
    //                 ]
    //             ],
    //             'response' => $response->body(),
    //             'status' => $response->status(),
    //         ]);

    //         throw new \Exception('Failed to retrieve shipping rates: ' . $response->body());
    //     }
    // }




}
