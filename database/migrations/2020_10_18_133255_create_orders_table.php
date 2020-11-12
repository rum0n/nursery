<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('tree_id');
            $table->string('transaction_id');
            $table->string('customer_name');
            $table->string('customer_mobile');
            $table->string('customer_email')->nullable();
            $table->double('amount');
            $table->integer('qty');
            $table->string('currency');
            $table->string('status');
            $table->string('customer_address');
            $table->string('city')->nullable();
            $table->integer('owner_id');
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
        Schema::dropIfExists('orders');
    }
}
