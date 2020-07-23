<?php

use Illuminate\Database\Seeder;
use App\User;

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
        User::create([
            'name'      => 'Manoela',
            'email'     => 'aleonamaissac@gmail.com',
            'password'  => bcrypt('password'),
            'role_id'   => 1
        ]);
        User::create([
            'name'      => 'test',
            'email'     => 'test@gmail.com',
            'password'  => bcrypt('test'),
            'role_id'   => 2
        ]);

    }


}
