<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmittersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('submitter_name');
            $table->timestamps();
        });

        $json = File::get("database/data/2020_03_26_174433_create_submitters_table.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            \App\Submitter::create(array(
                'id' => $obj->id,
                'submitter_name' => $obj->submitter_name,
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
        Schema::table('submitters', function (Blueprint $table) {
            //
        });
    }
}
