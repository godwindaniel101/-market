<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('Product_id');
            $table->text('item_name')->nullable();
            $table->string('item_image')->nullable();
            $table->text('item_description')->nullable();
            $table->text('item_cost')->nullable();
            $table->text('item_new_cost')->nullable();
            $table->text('item_stock')->nullable();
            $table->text('item_saved')->nullable();
            $table->text('item_percentage')->nullable();
            $table->text('stock_left')->nullable();
            $table->text('item_duration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
      *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
