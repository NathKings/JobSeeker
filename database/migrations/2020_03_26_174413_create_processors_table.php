<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('processor_name');
            $table->timestamps();
        });
        $json = File::get("database/data/2020_03_26_174413_create_processors_table.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            \App\Processor::create(array(
                'id' => $obj->id,
                'processor_name' => $obj->processor_name,
            ));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('processors', function (Blueprint $table) {
            //
        });
    }
}
