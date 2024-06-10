<?php

namespace App\Services;

use App\Models\Client;
use App\Services\AddressService;

class ClientService{

    private $addressService;
    private $asaasService;

    public function __construct(AddressService $addressService, AsaasService $asaasService){
        $this->addressService = $addressService;
        $this->asaasService = $asaasService;
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
            $this->createOrUpdateClientOnGateway($client);
            return $client->fresh();
        }catch(\Exception $e){
            //TODO throw exception
            dd($e->getMessage());
        }
    }

    public function createOrUpdateClientOnGateway(Client $client){
        if(!$client->gateway_id){
            $gatewayId = $this->asaasService->createClient($client);
            $client->gateway_id = $gatewayId;
            $client->save();
        }
        //TODO: update client data in gateway
    }
}