<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
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
                'name'      => 'Основной склад',
                'address'   => 'Уфа, Российская 12'
            ],
            [
                'name'      => 'Временный склад',
                'address'   => 'Уфа, Блюхера 15/3'
            ]
        ];

        foreach ($data as $model) {
            Location::create($model);
        }
    }
}
