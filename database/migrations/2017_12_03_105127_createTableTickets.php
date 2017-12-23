<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject', 255);
            $table->mediumText('content');
            $table->integer('created_by')->foreign('id')->reference('id')->on('users');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('out_of_date')->default(0);
            $table->tinyInteger('priority');
            $table->dateTime('deadline');
            $table->integer('assigned_to')->default(0);
            $table->integer('rating')->nullable();
            $table->integer('attachment')->default(0);
            $table->integer('team_id');
            $table->integer('resolved_at')->default(0);
            $table->integer('closed_at')->default(0);
            $table->integer('deleted_at')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
