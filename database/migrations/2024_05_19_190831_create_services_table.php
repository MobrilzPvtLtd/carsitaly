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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_type')->nullable();
            $table->string('title',255)->nullable();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('category')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_capacity')->nullable();
            $table->string('luggage_capacity')->nullable();
            $table->longText('vehicle_features')->nullable();
            $table->string('cruise_line')->nullable();
            $table->string('ship_name')->nullable();
            $table->string('address',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('state',255)->nullable();
            $table->string('country',255)->nullable();
            $table->string('pin_code',255)->nullable();
            $table->decimal('latitude', 4, 2)->nullable();
            $table->decimal('longitude', 4, 2)->nullable();
            $table->longText('description_details')->nullable();
            $table->string('mobile',255)->nullable();
            $table->string('email',255)->unique()->nullable();
            $table->longText('amenities')->nullable();
            $table->string('room_types',255)->nullable();
            $table->string('facilities')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('package',)->nullable();
            $table->longText('images')->nullable();
            $table->longText('videos')->nullable();
            $table->string('cabin_images')->nullable();
            $table->string('rating')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->string('number_of_bedrooms',255)->nullable();
            $table->string('number_of_bathrooms',255)->nullable();
            $table->string('maximum_occupancy',255)->nullable();
            $table->string('square_footage',255)->nullable();
            $table->string('floor_plan',255)->nullable();
            $table->string('kitchen',255)->nullable();
            $table->string('living_room',255)->nullable();
            $table->string('internet',255)->nullable();
            $table->string('air_conditioning',255)->nullable();
            $table->string('heating',255)->nullable();
            $table->string('swimming_pool',255)->nullable();
            $table->string('parking',255)->nullable();
            $table->string('outdoor_space',255)->nullable();
            $table->string('additional_amenities',255)->nullable();
            $table->longText('destinations')->nullable();
            $table->longText('starting_point')->nullable();
            $table->longText('ending_point')->nullable();
            $table->string('duration')->nullable();
            $table->longText('start_date')->nullable();
            $table->longText('end_date')->nullable();
            $table->string('itinerary')->nullable();
            $table->string('free_time')->nullable();
            $table->string('departure')->nullable();
            $table->string('destination')->nullable();
            $table->string('return')->nullable();
            $table->string('cabin_type')->nullable();
            $table->string('included')->nullable();
            $table->string('optional')->nullable();
            $table->string('entertainment')->nullable();
            $table->string('dining')->nullable();
            $table->string('safety')->nullable();
            $table->string('age')->nullable();
            $table->string('health')->nullable();
            $table->string('cancellation_policy')->nullable();
            $table->string('terms_and_conditions')->nullable();

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
        Schema::dropIfExists('services');
    }
};
