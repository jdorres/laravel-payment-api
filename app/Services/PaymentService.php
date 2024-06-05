<?php

namespace App\Services;

class PaymentService
{
    private $clientService;

    public function __construct($clientService){
        $clientService = $clientService;
    }
    
    public function store(){
        try{
            //TODO creates or updates client and return it's id

            //TODO registers payment in class Payment

            //TODO request to Asaas gateway payment creation

        }catch(Exception $e){
            //TODO throw exception
        }
    }
}