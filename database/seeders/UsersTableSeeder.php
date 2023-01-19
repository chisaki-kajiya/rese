<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '管理者',
            'email' => 'admin@test.com',
            'password' => bcrypt('testtest'),
            'role' => 1,
        ];
        User::create($param);

        $param = [
            'name' => '仙人責任者',
            'email' => 'rep@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '牛助責任者',
            'email' => 'rep2@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '戦慄責任者',
            'email' => 'rep3@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => 'ルーク責任者',
            'email' => 'rep4@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '志摩屋責任者',
            'email' => 'rep5@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '香責任者',
            'email' => 'rep6@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => 'JJ責任者',
            'email' => 'rep7@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => 'らーめん極み責任者',
            'email' => 'rep8@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '鳥雨責任者',
            'email' => 'rep9@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '築地色合責任者',
            'email' => 'rep10@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '晴海責任者',
            'email' => 'rep11@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '三子責任者',
            'email' => 'rep12@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '八戒責任者',
            'email' => 'rep13@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '福助責任者',
            'email' => 'rep14@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => 'ラー北責任者',
            'email' => 'rep15@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '翔責任者',
            'email' => 'rep16@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '経緯責任者',
            'email' => 'rep17@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '漆責任者',
            'email' => 'rep18@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => 'THE TOOL責任者',
            'email' => 'rep19@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);

        $param = [
            'name' => '木船責任者',
            'email' => 'rep20@test.com',
            'password' => bcrypt('testtest'),
            'role' => 2,
        ];
        User::create($param);
    }
}
