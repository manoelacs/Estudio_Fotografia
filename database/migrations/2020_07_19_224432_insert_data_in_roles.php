<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use  \Illuminate\Support\Facades\DB;

class InsertDataInRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       $roles = [
           [
               'id'  => 1,
               'name'=> 'Administrador'
           ],
           [
               'id'  => 2,
               'name'=> 'Cliente'
           ]
       ];
       foreach ($roles as $item){
           $rows[] = [
               'id' => $item['id'],
               'name'=> $item['name']
           ];
       }
        DB::table('roles')->insert($rows);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
}
