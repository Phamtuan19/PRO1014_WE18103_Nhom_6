<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_code', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name');
            $table->string('discount_code');
            $table->tinyInteger('percentage_decrease'); // số phần trăm giảm của mã giảm giá
            $table->text('content'); // nội dung cho mã giảm giá
            $table->integer('quantity');
            $table->integer('remaining_quantity')->nullable();
            $table->date('time_application'); // thời gian áp dụng cho mã
            $table->date('expired'); // thời gian áp dụng
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
        Schema::dropIfExists('discount_code');
    }
}
