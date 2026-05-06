<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            // Claves foráneas
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Aquí le indicamos explícitamente a Laravel a qué tabla hace referencia el session_id
            $table->foreignId('session_id')->constrained('sessions_activities')->onDelete('cascade');
            
            $table->enum('status', ['active', 'cancelled', 'completed'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};