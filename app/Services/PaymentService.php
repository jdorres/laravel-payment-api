<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Payment;
use App\Services\ClientService;
use Illuminate\Support\Arr;

class PaymentService
{
    private $clientService;

    public function __construct(ClientService $clientService){
        $this->clientService = $clientService;
    }

    public function store(array $paymentData){
        try{
            $client = $this->clientService->createOrUpdateClient(Arr::pull($paymentData, 'client'));

            //TODO registers payment in class Payment
            $payment = $this->registerPayment($client, $paymentData);

            //TODO request to Asaas gateway payment creation

            return $payment;

        }catch(\Exception $e){
            //TODO throw exception
            dd($e->getMessage());
        }
    }

    public function registerPayment(Client $client, array $paymentData):Payment{
        //TODO: registerPayment
        dd($paymentData);
        $payment = Payment::create();
        return $payment;
    }
}