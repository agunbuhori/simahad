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
        Schema::create('subject_goals', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->tinyInteger('sequence');
            $table->string('title');
            $table->text('description')
                ->nullable();
            $table->foreignUuid('subject_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_goals');
    }
};
