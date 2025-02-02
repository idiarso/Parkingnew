<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('special_validations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parking_session_id')->constrained()->onDelete('cascade');
            $table->string('validation_type');
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->string('validated_by');
            $table->timestamp('validated_at');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('special_validations');
    }
};