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
            $table->unsignedBigInteger('cat_id'); // Define cat_id column
            $table->foreign("cat_id")->references("category_id")->on("product_categories")->onDelete('restrict');

            $table->string('product_name',80);
            $table->text("product_description",166);
            $table->unsignedInteger("product_amount");
            $table->float("product_price");
            $table->string("product_image");

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
