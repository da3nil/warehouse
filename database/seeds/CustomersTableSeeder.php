<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'          => 'ООО БашРТС',
                'total_amount'  => '12399',
                'total_ordered' => '2'
            ],
            [
                'name'          => 'ООО Уфа-Строй',
                'total_amount'  => '8460',
                'total_ordered' => '1'
            ]
        ];

        foreach ($data as $model) {
            Customer::create($model);
        }
    }
}
