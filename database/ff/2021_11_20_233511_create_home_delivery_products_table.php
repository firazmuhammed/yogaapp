<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeDeliveryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_delivery_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 512)->index();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('quantity')->default(1);
            $table->string('image', 255)->nullable();
            $table->unsignedBigInteger('category_id')->index();
            $table->boolean('status')->default(1);
            $table->string('short_description', 255)->nullable();
            $table->text('long_description')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_delivery_products');
    }
}
