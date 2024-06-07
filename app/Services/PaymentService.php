<?php

namespace App\Services;

use App\Services\ClientService;

class PaymentService
{
    private $clientService;

    public function __construct(ClientService $clientService){
        $clientService = $clientService;
    }

    public function store(){
        try{
            //TODO creates or updates client and return it's id
            $this->clientService->createOrUpdateClient();

            //TODO registers payment in class Payment

            //TODO request to Asaas gateway payment creation

        }catch(\Exception $e){
            //TODO throw exception
        }
    }
}