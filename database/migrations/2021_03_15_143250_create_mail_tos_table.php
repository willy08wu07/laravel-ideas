<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailTosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_tos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mail_id');
            $table->foreign('mail_id')->references('id')->on('mails');
            $table->unsignedBigInteger('to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_tos');
    }
}
