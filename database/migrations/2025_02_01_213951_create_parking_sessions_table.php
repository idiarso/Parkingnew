<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parking_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('entry_gate_id')->constrained('gates');
            $table->foreignId('exit_gate_id')->nullable()->constrained('gates');
            $table->foreignId('vehicle_type_id')->constrained();  // Add this line
            $table->string('ticket_number');
            $table->string('plate_number');
            $table->string('entry_photo')->nullable();
            $table->string('exit_photo')->nullable();
            $table->timestamp('entry_time');
            $table->timestamp('exit_time')->nullable();
            $table->decimal('parking_fee', 10, 2)->default(0);
            $table->enum('status', ['ACTIVE', 'COMPLETED', 'VOID'])->default('ACTIVE');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parking_sessions');
    }
};