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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['speech', 'motion', 'qa'])->default('qa');
            $table->foreignId('meeting_id')->constrained()->cascadeOnDelete();
            $table->foreignId('primary_participant_id')->constrained('participants')->cascadeOnDelete();
            $table->foreignId('secondary_participant_id')->nullable()->constrained('participants')->cascadeOnDelete();
            $table->string('subject');
            $table->text('content');
            $table->text('secondary_content')->nullable();
            $table->string('record_number')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
