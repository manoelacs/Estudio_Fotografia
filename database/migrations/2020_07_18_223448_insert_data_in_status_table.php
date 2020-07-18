<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertDataInStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $status=[
            [
               'id' => 1,
               'name' => 'Bloqueado'
            ],
            [
                'id' => 2,
                'name' => 'Liberado'
            ],
            [
                'id' => 3,
                'name' => 'Solicitado'
            ],
            [
                'id' => 4,
                'name' => 'Disponível'
            ]
        ];

        foreach ($status as $item){
            $rows[] = [
             'id'  => $item['id'],
             'name'=> $item['name']
            ];
        }

       DB::table('status')->insert($rows);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
