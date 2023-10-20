<?php

use App\Enum\Education;
use App\Enum\Gender;
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
        Schema::create('student_parents', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->string('name');
            $table->enum('gender', Gender::toArray())
                ->nullable();
            $table->date('birthdate')
                ->nullable();
            $table->enum('last_education', Education::toArray())
                ->nullable();
            $table->tinyInteger('occupation_id')
                ->unsigned()
                ->nullable();
            $table->integer('salary')
                ->nullable();
            $table->boolean('still_alive')
                ->default(true);
            $table->string('phone_number', 14)
                ->nullable();
            $table->char('address_code', 13)
                ->nullable();
            $table->text('address_detail')
                ->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
            $table->foreign('occupation_id')
                ->references('id')
                ->on('occupations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parents');
    }
};
