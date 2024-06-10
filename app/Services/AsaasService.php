<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\Http;

class AsaasService {
    private $apiKey;
    private $url;

    public function __construct(){
        $this->apiKey = config('gateway.asaas.key');
        $this->url = config('gateway.asaas.url');
    }

    public function createClient(Client $client){
        $headers = $this->mountHeaders();
        $body = [
            "name" => $client->name,
            "email" => $client->email,
            "phone" => $client->phone,
            "mobilePhone" => $client->phone,
            "cpfCnpj" => $client->document,
            "postalCode" => $client->address->zipcode,
            "address" => $client->address->street,
            "addressNumber" => $client->address->number,
            "complement" => $client->address->complement,
            "province" => $client->address->district,
            "externalReference" => $client->id,
            "notificationDisabled" => true,
            "additionalEmails" => "",
            "municipalInscription" => "",
            "stateInscription" => "",
            "observations" => ""
        ];

        $client = Http::withHeaders($headers)->post($this->url.'/customers', $body);
        return $client;
    }

    public function mountHeaders(){
        return [
            'Content-Type' => 'application/json',
            'access_token' => $this->apiKey,
            'Accept'       => 'application/json'
        ];
    }

    public function pix(){
        //TODO pix method
    }
}