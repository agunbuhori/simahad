<?php

use App\Enum\Relationship;
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
        Schema::create('student_has_parents', function (Blueprint $table) {
            $table->foreignUuid('student_id')
                ->constrained();
            $table->foreignUuid('student_parent_id')
                ->constrained();
            $table->enum('relationship', Relationship::toArray());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_has_parents');
    }
};
