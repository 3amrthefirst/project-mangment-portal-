<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {

        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, "v1/" . $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);
        return $response->getBody()->getContents();
    }
}
