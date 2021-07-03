<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('new_products')->insert([
            'name'=>'Adata 1TB HD710',
            'price'=>'10',
            'description'=>'Lorem Ipsum Lorem Ipsum Lorem',
            'quantity'=>'25',
            'image'=> '/images/product6.png'
        ]);
    }
}
