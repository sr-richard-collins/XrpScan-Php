<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class XrpScanController extends Controller
{
    public function fetchObligation()
    {
        $client = new Client();
        $uri = 'https://api.xrpscan.com/api/v1/account/rUN5Zxt3K1AnMRJgEWywDJT8QDMMeLH5ok/obligation/4155444400000000000000000000000000000000';

        try {
            $response = $client->get($uri, [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36' //add this
                ]
            ]);

            $body = $response->getBody();
            $content = $body->getContents();

            return response()->json([
                'status' => 'success',
                'data' => json_decode($content)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 403);
        }
    }
}
