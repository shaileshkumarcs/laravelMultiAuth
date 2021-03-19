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
            $table->increments('id');
            $table->string('sku')->unique();
            $table->string('product_name');
            $table->string('product_description');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('vendor_id');
            $table->string('quantity_per_unit');
            $table->decimal('unit_price',9,3);
            $table->decimal('msrp', 9,3);
            $table->string('available_size')->nullable();
            $table->string('available_color')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('discount')->nullable();
            $table->string('unit_weight')->nullable();
            $table->string('unit_in_stock')->nullable();
            $table->string('unit_in_order')->nullable();
            $table->string('reorder_level')->nullable();
            $table->boolean('product_available')->nullable();
            $table->boolean('discount_available')->nullable();
            $table->string('current_order')->nullable();
            $table->string('picture_url')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();


            //FOREIGN KEY CONSTRAINTS
            $table->foreign('product_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('categories');
        Schema::dropIfExists('users');
    }
}
