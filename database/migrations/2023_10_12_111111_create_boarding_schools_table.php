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
        Schema::create('boarding_schools', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->string('name');
            $table->string('npsn', 20)
                ->nullable();
            $table->string('email', 64)
                ->nullable();
            $table->string('phone_number', 14)
                ->nullable();
            $table->char('address_code')
                ->nullable();
            $table->text('address_detail')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarding_schools');
    }
};
