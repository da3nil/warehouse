<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Строительные материалы'
            ],
            [
                'name' => 'Запчасти'
            ],
            [
                'name' => 'Устройства'
            ]
        ];

        $types = [
            [
                'name' => 'Труба полиэтиленовая Polytron ProDren 110 мм 50 м',
                'price' => 4349,
                'category_id' => 1,
                'supplier_id' => 3,
                'description' => 'Полиэтиленовые трубы PRODREN - это гофрированные перфорированные трубы с рёбрами жёсткости и большим количеством мелких отверстий, которые находятся во впадине гофры. Такая структура позволяет трубопроводам равномерно распределять давление грунта и, без ущерба для конструкции трубы, принимать дополнительные нагрузки.'
            ],
            [
                'name' => 'Газобетонный блок Ytong D500 625x75x250 мм',
                'price' => 61,
                'category_id' => 1,
                'supplier_id' => 3,
                'description' => 'Газобетонный блок YTONG D500 - строительный материал, в котором сочетаются прочность, надежность и экологичность. Его можно использовать для возведения наружных и внутренних стен зданий, в качестве перегородок, а также для сооружения интерьерных решений.'
            ],
            [
                'name' => 'Дисплей Asus ZenFone 3 Max (ZC520TL) 5.2 + тачскрин черный',
                'price' => 1340,
                'category_id' => 2,
                'supplier_id' => 2,
                'description' => ''
            ],
            [
                'name' => 'АКБ iPhone 6 Original',
                'price' => 790,
                'category_id' => 2,
                'supplier_id' => 2,
                'description' => ''
            ],
        ];

        $current = [
            [
                'type_id'       => 1,
                'status_id'     => 1,
                'location_id'   => 1,
                'qty'           => 8
            ],
            [
                'type_id'       => 2,
                'status_id'     => 1,
                'location_id'   => 1,
                'qty'           => 1
            ],
            [
                'type_id'       => 3,
                'status_id'     => 1,
                'location_id'   => 1,
                'qty'           => 4
            ],
            [
                'type_id'       => 4,
                'status_id'     => 1,
                'location_id'   => 1,
                'qty'           => 6
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\ProductCategory::create($category);
        }

        foreach ($types as $type) {
            \App\Models\ProductType::create($type);
        }

        foreach ($current as $item) {
            \App\Models\Product::create($item);
        }
    }
}
