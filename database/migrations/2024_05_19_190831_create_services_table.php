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
            $table->longText('image')->nullable();
            $table->string('title',255)->nullable();
            $table->string('slug')->unique();
            $table->string('mobile',255)->nullable();
            $table->string('email',255)->unique()->nullable();
            $table->string('pin_code',255)->nullable();
            $table->string('address',255)->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('rating')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('city',255)->nullable();
            $table->string('country',255)->nullable();
            $table->decimal('duration', 10, 2)->nullable();
            $table->string('room_no',255)->nullable();
            $table->string('adults',255)->nullable();
            $table->longText('meals')->nullable();
            $table->longText('facilities')->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->boolean('similar')->default(0)->nullable();

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
