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
        Schema::create('cohort_bills', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->foreignUuid('cohort_id')
                ->constrained();
            $table->string('title');
            $table->unsignedInteger('bill');
            $table->date('due_date');
            $table->text('description')
                ->nullable();
            $table->boolean('billed')
                ->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cohort_bills');
    }
};
