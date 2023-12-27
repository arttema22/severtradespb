<?php

namespace Database\Seeders\catalog;

use Illuminate\Database\Seeder;
use App\Models\Catalog\Productattribute;

class ProductattributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Productattribute::create([
            'name' => 'Размер',
            'required' => '0',
            'sorting' => '1',
        ]);

        Productattribute::create([
            'name' => 'Марка',
            'required' => '0',
            'sorting' => '2',
        ]);

        Productattribute::create([
            'name' => 'Длина',
            'required' => '0',
            'sorting' => '3',
        ]);
    }
}
