<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

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
            [
                'name' => 'LG Mobile',
                'price' => '10000',
                'description' => 'A SmartPhone with 4gb Ram and Much More Features.',
                'category' => 'mobile',
                'gallery' => 'https://fdn2.gsmarena.com/vv/pics/lg/lg-g3-5.jpg',
            ],
            [
                'name' => 'OPPO Mobile',
                'price' => '20000',
                'description' => 'A SmartPhone with 8gb Ram and Much More Features.',
                'category' => 'mobile',
                'gallery' => 'https://fdn2.gsmarena.com/vv/pics/oppo/oppo-a54-1.jpg',
            ],
            [
                'name' => 'Panasonic TV',
                'price' => '10000',
                'description' => 'A SmartTV with So Much Features.',
                'category' => 'TV',
                'gallery' => 'https://image.panasonic.com/is/image/Panasonic/1-206?$Thumbnail96$&wid=96&hei=54&fmt=png-alpha',
            ],
            [
                'name' => 'Samsung Galaxy S21 Ultra',
                'price' => '15000',
                'description' => 'A SmartPhone with 128GB 8GB RAM and Much More Features.',
                'category' => 'mobile',
                'gallery' => 'https://fdn.gsmarena.com/imgroot/reviews/21/samsung-galaxy-s21-ultra-long-term/lifestyle/-1200w5/gsmarena_024.jpg',
            ],
        ]);
    }
}
