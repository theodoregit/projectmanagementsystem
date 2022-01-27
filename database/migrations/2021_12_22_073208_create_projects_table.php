<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('projecttitle');
            $table->string('startdate');
            $table->string('enddate');
            $table->string('teamleader');
            $table->string('teammembers');
            $table->longText('description');
            $table->integer('totalweight')->default(1);
            $table->string('status')->default('active');
            $table->integer('accomplishment')->default(0);
            $table->string('fullname');
            $table->string('phonenumber');
            $table->string('unit');
            $table->string('subunit')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
