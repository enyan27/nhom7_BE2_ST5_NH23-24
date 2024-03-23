<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('productname');
            $table->double('price');
            $table->double('price_sale')->nullable();
            $table->string('sku');
            $table->tinyInteger('featured');         
            $table->string('slug')->unique();
            $table->integer('quantity');
            $table->longText('description');
            $table->unsignedBigInteger('created_by');
            $table->integer('sold')->default(0);
            $table->integer('view_count')->nullable();
            $table->integer('rate_total')->nullable();
            $table->double('rate_count')->nullable();
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
};
