<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobsTable', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('processor_id');
            $table->foreign('processor_id')->references('id')->on('processors')->onDelete('cascade');
            $table->unsignedBigInteger('submitter_id');
            $table->foreign('submitter_id')->references('id')->on('submitters')->onDelete('cascade');
            $table->integer('state');
            $table->string('priority');
            $table->string('name', 50);
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
