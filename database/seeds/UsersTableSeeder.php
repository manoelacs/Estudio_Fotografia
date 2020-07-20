<?php

use Illuminate\Database\Seeder;

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
    private $roles;

    public function run()
    {
        $user = User::create([
            'name'      => 'Manoela',
            'email'     => 'aleonamaissac@gmail.com',
            'password'  => bcrypt('password'),
            'role_id' => 1
        ]);

    }


}
