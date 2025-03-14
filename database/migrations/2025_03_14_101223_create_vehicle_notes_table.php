<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vehicle_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('mileage');
            $table->decimal('fuel_quantity',8,3);
            $table->date('date');
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle_notes');
    }
};
