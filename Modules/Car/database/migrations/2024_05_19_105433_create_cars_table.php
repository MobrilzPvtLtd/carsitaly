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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('brand')->nullable();
            $table->longText('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('warranty')->nullable();
            $table->string('mileage')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('car_type')->nullable();
            $table->string('pickUp_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('seating_capacity')->nullable();
            $table->string('top_speed')->nullable();
            $table->string('rating')->nullable();
            $table->string('transmission')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('car_features')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
