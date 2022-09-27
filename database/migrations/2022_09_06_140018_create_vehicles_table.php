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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->nullable(false);
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->integer('age');
            $table->string('title');
            $table->decimal('price', 8, 4);
            $table->integer('quantity');
            $table->enum("status", [0, 1])->default(1)->comment("0:passive, 1:active");
            $table->enum("gear", ['MANUAL', 'AUTOMATIC'])->nullable(false)->comment("MANUAL, AUTOMATIC");
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
        Schema::dropIfExists('vehicles');
    }
};
