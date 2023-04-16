<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integerIncrements('id');
            $table->string('code_order');
            $table->integer('user_id')->nullable(); // (người dùng có tài khoản)
            $table->integer('discount_code_id')->nullable();

            // $table->string('order_notes_id')->nullable(); // ghi chú của người dùng
            $table->string('order_status_id'); // trạng thái đơn hàng
            $table->integer('payment_form'); // hình thức thanh toán
            $table->integer('payment_status_id')->nullable(); // trạng thái thanh toán
            $table->tinyInteger('quantity'); // số lượng sản phẩm của đơn hàng
            $table->integer('total_price'); // tổng số tiền của đơn hàng
            $table->integer('shipping_fee')->nullable(); // phí vận chuyển
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
