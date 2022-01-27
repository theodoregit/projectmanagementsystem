<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateTaskStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_task_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taskname');
            $table->string('personincharge');
            $table->longText('accomplishment')->nullable();
            $table->longText('challenge')->nullable();
            $table->integer('accomplishedweight')->default(0);
            $table->integer('is_last_update')->default(0);
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
        Schema::dropIfExists('update_task_statuses');
    }
}
