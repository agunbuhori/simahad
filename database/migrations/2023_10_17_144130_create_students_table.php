<?php

use App\Enum\Gender;
use App\Enum\Religion;
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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->string('nis', 20)
                ->nullable();
            $table->string('nisn', 20)
                ->nullable();
            $table->string('name');
            $table->enum('gender', Gender::toArray())
                ->nullable();
            $table->string('birthplace')
                ->nullable();
            $table->date('birthdate')
                ->nullable();
            $table->enum('religion', Religion::toArray())
                ->nullable();
            $table->char('address_code', 13)
                ->nullable();
            $table->text('address_detail')
                ->nullable();
            $table->string('previous_school')
                ->nullable();
            $table->foreignUuid('class_room_id')
                ->constrained();
            $table->foreignUuid('cohort_id')
                ->constrained();
            $table->boolean('active')
                ->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
