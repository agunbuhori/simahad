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
        Schema::create('student_activities', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->foreignUuid('student_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignUuid('activity_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->text('description')
                ->nullable();
            $table->boolean('notify_parent')
                ->default(true);
            $table->foreignUuid('teacher_id')
                ->nullable()
                ->constrained();
            $table->dateTime('time')
                ->nullable();
            $table->json('documentation')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_activities');
    }
};
