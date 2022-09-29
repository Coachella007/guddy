<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('usersemail')->nullable();
            $table->integer('amountloaned')->nullable();
            $table->string('fullname')->nullable();
            $table->string('phone')->nullable();
            $table->integer('intrest')->nullable();
            $table->string('status')->nullable();
            $table->string('paid')->nullable();
            $table->timestamps();
            // $table->foreign('user_id')->refrences('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
