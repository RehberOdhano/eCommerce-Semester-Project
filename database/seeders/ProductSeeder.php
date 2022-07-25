<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'Camera-II',
            'price'=>'10',
            'description'=>'Lorem Ipsum Lorem Ipsum Lorem',
            'quantity'=>'25',
            'image'=> '/images/p9.png'
        ]);
    }
}
