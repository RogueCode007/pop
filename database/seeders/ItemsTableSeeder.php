<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name'=> 'sample1',
            'price'=> 4000,
            'description'=> 'random string1',
            'category'=> 'dress',
            'image_name'=> 'randomname1'
        ]);
        Item::create([
            'name'=> 'sample2',
            'price'=> 5000,
            'description'=> 'random string2',
            'category'=> 'shoe',
            'image_name'=> 'randomname2'
        ]);
    }
}
