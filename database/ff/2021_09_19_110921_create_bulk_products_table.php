<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulkProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulk_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 512)->index();
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->integer('available_quantity')->default(1);
            $table->string('unit', 255);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('bulk_products');
    }
}
