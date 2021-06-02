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
            $table->id();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('location_id');
            $table->integer('qty')->default(0);

            // Переехало с прототипов
            $table->string('name')->default('Без названия');
            $table->integer('price')->default(0);
            $table->string('img', 300)->default('argon/img/default-product.jpg');
            $table->unsignedBigInteger('category_id');
            $table->text('description');

            $table->foreign('category_id')->references('id')->on('product_categories');

            $table->softDeletes();
            $table->timestamps();

//            $table->foreign('type_id')->references('id')->on('product_types');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('location_id')->references('id')->on('locations');
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
