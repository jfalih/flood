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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->string('latitude')->nullable(); // String field for latitude
            $table->string('longitude')->nullable(); // String field for longitude
            $table->string('image1')->nullable(); // Column for the first image filename
            $table->string('image2')->nullable(); // Column for the second image filename
            $table->string('image3')->nullable(); // Column for the third image filename
            $table->string('image4')->nullable(); // Column for the fourth image filename
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
        Schema::dropIfExists('places');
    }
};
