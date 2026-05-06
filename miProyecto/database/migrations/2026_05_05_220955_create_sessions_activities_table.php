<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessions_activities', function (Blueprint $table) {
            $table->id();
            // Claves foráneas
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
            $table->foreignId('installation_id')->constrained('installations')->onDelete('cascade');
            
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions_activities');
    }
};