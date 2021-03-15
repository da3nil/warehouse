<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name'  => 'Доставлено',
                'value' =>  'success'
            ],
            [
                'name'  => 'В пути',
                'value' =>  'info'
            ],
            [
                'name'  => 'Ожидание',
                'value' =>  'warning'
            ],
            [
                'name'  => 'Задержка',
                'value' =>  'danger'
            ],
        ];

        foreach ($statuses as $status) {
            \App\Models\Status::create($status);
        }
    }
}
