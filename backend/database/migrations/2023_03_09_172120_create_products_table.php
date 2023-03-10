<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('product_code');
            $table->integer('author_id'); // tấc giả
            $table->integer('category_id');
            $table->integer('publishing_house_id'); // nhà xuất bản
            $table->integer('user_id'); // người đăng
            $table->string('name');
            $table->text('title');
            $table->text('introduction'); // giới thiệu
            $table->date('publication_date'); // ngày xuất bản
            $table->date('is_deleted'); //
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
        Schema::dropIfExists('products');
    }
}
