<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */

    public function run()
    {
        User::create(
            [
            'name'      => 'Manoela',
            'email'     => 'aleonamaissac@gmail.com',
            'phone'      =>'82996089487',
            'password'  => bcrypt('12345678'),
            'role_id'   => 1
        ],
            [
                'name'      => 'test',
                'email'     => 'test@gmail.com',
                'phone'     => '99999999999',
                'password'  => bcrypt('test1234'),
                'role_id'   => 2
            ]
        );
    }
}
