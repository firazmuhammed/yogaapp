<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeDeliveryOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_delivery_order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->index();
            $table->string('product_name');
            $table->decimal('price', 10,2);
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('home_delivery_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_delivery_order_details');
    }
}
