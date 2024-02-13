<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("state")->nullable();
            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            $table->integer('category')->nullable();
            $table->text('description')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();
            $table->string('image_6')->nullable();
            $table->string('image_7')->nullable();
            $table->string('image_8')->nullable();
            $table->string('image_9')->nullable();
            $table->text('tags')->nullable();
            $table->integer('product_status')->nullable();
            $table->integer('wheight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('long')->nullable();
            $table->integer('width')->nullable();
            $table->integer('campus')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('value')->nullable();
            $table->integer('old_value')->nullable();
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
        Schema::dropIfExists('product');
    }
}
