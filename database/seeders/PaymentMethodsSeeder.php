<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(PaymentMethod::count()==0){
            PaymentMethod::create(['name' => 'Pix', 'type' => 'pix', 'active' => true]);
            PaymentMethod::create(['name' => 'Boleto', 'type' => 'bank_slip', 'active' => true]);
        }
    }
}
