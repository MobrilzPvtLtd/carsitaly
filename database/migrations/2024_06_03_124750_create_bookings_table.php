<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->string('booking_type', 255)->nullable();
            $table->string('pickup_location', 255)->nullable();
            $table->string('intermediate_stop', 255)->nullable();
            $table->string('drop_location', 255)->nullable();
            $table->string('terminal', 255)->nullable();
            $table->string('travel_type', 255)->nullable();
            $table->string('travel_number', 255)->nullable();
            $table->string('platform', 255)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('adult',255)->nullable();
            $table->string('child',255)->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->boolean('seen')->default(0)->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
