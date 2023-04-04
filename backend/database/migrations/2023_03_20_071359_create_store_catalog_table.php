<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreCatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_catalog', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('path');
            $table->integer('parent_id');
            $table->integer('location');
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
        Schema::dropIfExists('store_catalog');
    }
}
