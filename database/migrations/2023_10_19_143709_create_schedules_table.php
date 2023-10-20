<?php

use App\Enum\DayName;
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
        Schema::create('schedules', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->foreignUuid('subject_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignUuid('class_room_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignUuid('teacher_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->enum('day', DayName::toArray());
            $table->time('time_start');
            $table->time('time_end');
            $table->string('note')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
