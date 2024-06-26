<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    private $service;

    public function __construct(PaymentService $service){
        $this->service = $service;
    }

    public function store(Request $request){
        //TODO: validate createPaymentRequest
        $payment = $this->service->store($request->all());
        return response()->json(['payment'=>$payment], Response::HTTP_CREATED);
    }
}
