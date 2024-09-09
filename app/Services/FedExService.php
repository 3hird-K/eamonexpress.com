<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache; // Use Cache for token storage

class FedExService
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

    public function getAuthToken()
    {
        $endpoint = $this->isSandbox
            ?
            'https://apis-sandbox.fedex.com'
            : 'https://apis.fedex.com/oauth/token';

        $response = Http::asForm()->post($endpoint, [
            'grant_type'    => 'client_credentials',
            'client_id'     => $this->key,
            'client_secret' => $this->password,
        ]);

        if ($response->successful()) {
            $tokenData = $response->json();
            $accessToken = $tokenData['access_token'];

            // Store the token in the cache (expires in 1 hour)
            Cache::put('fedex_access_token', $accessToken, now()->addHour());

            return $accessToken;
        } else {
            throw new \Exception('Failed to retrieve FedEx OAuth token: ' . $response->body());
        }
    }
}
