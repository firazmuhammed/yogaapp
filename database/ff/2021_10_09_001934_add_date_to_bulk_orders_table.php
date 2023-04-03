<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToBulkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulk_orders', function (Blueprint $table) {
            $table->string('abn_number')->nullable();
            $table->string('company_name')->nullable();
            $table->date('date_of_delivery')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bulk_orders', function (Blueprint $table) {
            //
        });
    }
}
