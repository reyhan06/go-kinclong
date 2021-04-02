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
            $table->id();
            $table->foreignId('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->string('invoice_number')->unique();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('vehicle_type');
            $table->string('vehicle_license_plate');
            $table->string('service_name');
            $table->enum('service_vehicle', ['car', 'motorcycle']);
            $table->enum('service_size', ['small', 'medium', 'large']);
            $table->enum('service_service', ['regular', 'waterless']);
            $table->enum('service_type', ['exterior', 'interior-and-exterior'])->nullable();
            $table->integer('service_cost');
            $table->enum('state', ['new', 'processed', 'finished', 'failed', 'canceled'])->default('new');
            $table->string('receipt')->nullable();
            $table->datetime('date');
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