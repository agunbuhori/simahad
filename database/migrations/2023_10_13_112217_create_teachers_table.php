<?php

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
        Schema::create('teachers', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->string('name');
            $table->enum('gender', Gender::toArray())
                ->nullable();
            $table->date('birthdate')
                ->nullable();
            $table->string('phone_number', 14)
                ->nullable();
            $table->char('address_code', 13)
                ->nullable();
            $table->text('address_detail')
                ->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignUuid('boarding_school_id')
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
