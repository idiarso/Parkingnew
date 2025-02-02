<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parking_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_type_id')->constrained();
            $table->string('rate_name', 100);
            $table->decimal('base_rate', 10, 2);
            $table->decimal('hourly_rate', 10, 2);
            $table->decimal('maximum_rate', 10, 2)->nullable();
            $table->integer('grace_period')->comment('in minutes');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parking_rates');
    }
};