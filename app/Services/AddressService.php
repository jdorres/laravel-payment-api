<?php

namespace App\Services;

use App\Models\Address;

class AddressService {
    public function store(int $clientId, array $addressData){
        $addressData["client_id"] = $clientId;
        $address = Address::create($addressData);
        return $address;
    }
}