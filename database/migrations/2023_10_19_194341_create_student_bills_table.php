<?php

use App\Enum\BillType;
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
        Schema::create('student_bills', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->string('title');
            $table->enum('type', BillType::toArray());
            $table->foreignUuid('cohort_bill_id')
                ->nullable()
                ->constrained();
            $table->foreignUuid('student_id')
                ->constrained();
            $table->unsignedInteger('bill');
            $table->unsignedSmallInteger('unique_code')
                ->default(0);
            $table->boolean('paid')
                ->default(false);
            $table->date('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_bills');
    }
};
