<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SuppliersTableSeeder extends Seeder
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
                'name'          => 'ООО УФА-ХИМ',
                'total_amount'  => '100100',
            ],
            [
                'name'          => 'ООО АвтоматикаСервис-Уфа',
                'total_amount'  => '4000',
            ],
            [
                'name'          => 'ООО УфаСтрой',
                'total_amount'  => '6000',
            ]
        ];

        foreach ($data as $model) {
            Supplier::create($model);
        }
    }
}
