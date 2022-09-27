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
        $longitude = 40.714;
        $latitude = -74.006;
        $location = [
            'long' => $longitude,
            'lat' => $latitude
        ];
        Schema::create('reservations', function (Blueprint $table) use($location) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->nullable(false);
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('from_date')->nullable(false);
            $table->dateTime('to_date')->nullable(false);
            $table->text('from_location')->nullable(false)->comment(json_encode($location));
            $table->text('to_location')->nullable(false)->comment(json_encode($location));
            $table->decimal('tax_price', 8, 4);
            $table->decimal('sub_total', 8, 4);
            $table->decimal('grand_total', 8, 4);
            $table->text('note')->nullable(true);
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
        Schema::dropIfExists('reservations');
    }
};
