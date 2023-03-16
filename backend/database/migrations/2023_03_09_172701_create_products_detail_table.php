<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_detail', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('product_id');
            $table->text('image_id');
            $table->string('size');
            $table->integer('page_number');
            $table->string('weight'); // cân nặng
            $table->integer('import_price');
            $table->integer('price');
            $table->integer('promotion_price'); //Giá ưu đãi
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
        Schema::dropIfExists('products_detail');
    }
}
