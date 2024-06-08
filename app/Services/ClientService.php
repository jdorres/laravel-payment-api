<?php

namespace App\Services;

use App\Models\Client;
use App\Services\AddressService;

class ClientService{

    private $addressService;

    public function __construct(AddressService $addressService){
        $this->addressService = $addressService;
    }

    public function createOrUpdateClient(array $clientData): Client{
        try{
            $client = Client::where("document", $clientData["document"])->first();
            if(!$client){
                $client = Client::create([
                    "document"  => $clientData["document"],
                    "name"      => $clientData["name"],
                    "email"     => $clientData["email"],
                    "phone"     => $clientData["phone"],
                    "birthdate" => $clientData["birthdate"]
                ]);
                $this->addressService->store($client->id, $clientData["address"]);
            }

            dd("debug 1");

            $clientGatewayId = $this->createOrUpdateClientOnGateway($client);
            $client->gatewayId = $clientGatewayId;
            return $client;
        }catch(\Exception $e){
            //TODO throw exception
            dd($e->getMessage());
        }
    }

    public function createOrUpdateClientOnGateway(Client $client){
        //TODO implement gateway method 
    }
}