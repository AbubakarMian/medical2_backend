<?php

use App\Model\Admin_url;
use Illuminate\Database\Seeder;

class Admin_url_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin_url::firstOrCreate(

            [
                'details'    => json_encode([

                'name'=>'payment',
                'url'=>[
                    'name'=>'order_payment.index',
                    'url'=>'admin/reports/payments',
            
                ]
                ]),
                
            ]

        );
    }
}
