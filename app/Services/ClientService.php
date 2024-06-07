<?php

namespace App\Services;

use App\Models\Client;

class ClientService{
    public function createOrUpdateClient(array $clientData): Client{
        $client = Client::updateOrCreate(
            [
                "idNumber" => $clientData["idNumber"]
            ],
            [
                "idNumber" => $clientData["idNumber"],
                "name" => $clientData["name"],
                "email" => $clientData["email"]
            ]
        );

        $clientGatewayId = $this->createOrUpdateClientOnGateway($client);
        $client->gatewayId = $clientGatewayId;
        return $client;
    }

    public function createOrUpdateClientOnGateway(Client $client){
        
    }
}