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
        Schema::create('quran_memorizations', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->foreignUuid('student_id')
                ->constrained();
            $table->unsignedTinyInteger('from_surah');
            $table->unsignedSmallInteger('from_ayah');
            $table->string('from_surah_ayah')->virtualAs("concat(from_surah, ':', from_ayah)");
            $table->unsignedTinyInteger('to_surah');
            $table->unsignedSmallInteger('to_ayah');
            $table->string('to_surah_ayah')->virtualAs("concat(to_surah, ':', to_ayah)");
            $table->text('note')
                ->nullable();
            $table->foreignUuid('teacher_id')
                ->nullable()
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quran_memorizations');
    }
};
