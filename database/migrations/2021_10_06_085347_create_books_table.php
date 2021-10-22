<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isbn');
            $table->integer('category_id');
            $table->integer('publisher_id');
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->string('size');
            $table->integer('num_of_page');
            $table->integer('quantity');
            $table->string('publish_date');
            $table->integer('price');
            $table->integer('view_count');
            $table->integer('creator_id');
            $table->string('feature_image_path');
            $table->string('feature_image_name')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('books');
    }
}
