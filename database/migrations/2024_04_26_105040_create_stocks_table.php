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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
            $table->string('name');
            $table->integer('A_plus')->default(0); // Adding columns for each blood type with default value 0
            $table->integer('A_minus')->default(0);
            $table->integer('B_plus')->default(0);
            $table->integer('B_minus')->default(0);
            $table->integer('AB_plus')->default(0);
            $table->integer('AB_minus')->default(0);
            $table->integer('O_plus')->default(0);
            $table->integer('O_minus')->default(0);
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
        Schema::dropIfExists('stocks');
    }
};
