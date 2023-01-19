<?php

namespace Database\Seeders;

use App\Models\Representative;
use Illuminate\Database\Seeder;

class RepresentativesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '2',
            'shop_id' => '1',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '3',
            'shop_id' => '2',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '4',
            'shop_id' => '3',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '5',
            'shop_id' => '4',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '6',
            'shop_id' => '5',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '7',
            'shop_id' => '6',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '8',
            'shop_id' => '7',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '9',
            'shop_id' => '8',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '10',
            'shop_id' => '9',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '11',
            'shop_id' => '10',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '12',
            'shop_id' => '11',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '13',
            'shop_id' => '12',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '14',
            'shop_id' => '13',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '15',
            'shop_id' => '14',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '16',
            'shop_id' => '15',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '17',
            'shop_id' => '16',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '18',
            'shop_id' => '17',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '19',
            'shop_id' => '18',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '20',
            'shop_id' => '19',
        ];
        Representative::create($param);

        $param = [
            'user_id' => '21',
            'shop_id' => '20',
        ];
        Representative::create($param);
        
    }
}
