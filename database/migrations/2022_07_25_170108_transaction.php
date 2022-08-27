<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaction extends Migration
{

    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('travel_packages_id');
            $table->integer('users_id');
            $table->integer('additional_visa');
            $table->integer('transaction_total');
            $table->string('transaction_status'); //In Cart, Pending, Success, Cancel, Failed
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
