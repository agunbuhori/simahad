<?php

use App\Enum\ClassLevel;
use App\Enum\Semester;
use App\Enum\SubjectType;
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
        Schema::create('subjects', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->string('title');
            $table->text('description')
                ->nullable();
            $table->enum('level', ClassLevel::toArray());
            $table->enum('type', SubjectType::toArray());
            $table->foreignUuid('boarding_school_id')
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
        Schema::dropIfExists('subjects');
    }
};
