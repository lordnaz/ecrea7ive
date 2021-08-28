<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockUpdateTrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_update_trails', function (Blueprint $table) {
            $table->id()->index();
            $table->string('item')->index();
            $table->string('sub_item')->nullable()->index();
            $table->string('prev_quantity');
            $table->string('now_quantity');
            $table->string('prev_price');
            $table->string('now_price');
            $table->string('description');
            $table->string('updated_by_name')->index();
            $table->foreignId('updated_by_id')->index();
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
        Schema::dropIfExists('stock_update_trails');
    }
}
