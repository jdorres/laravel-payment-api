<?php

namespace App\Services;

use App\Services\ClientService;

class PaymentService
{
    private $clientService;

    public function __construct(ClientService $clientService){
        $this->clientService = $clientService;
    }

    public function store(array $clientData){
        try{
            //TODO creates or updates client and return it's id
            $this->clientService->createOrUpdateClient($clientData);

            //TODO registers payment in class Payment

            //TODO request to Asaas gateway payment creation

        }catch(\Exception $e){
            //TODO throw exception
        }
    }
}