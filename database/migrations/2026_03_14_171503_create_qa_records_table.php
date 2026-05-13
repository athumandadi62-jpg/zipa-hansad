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
        Schema::create('qa_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id')->constrained()->onDelete('cascade');
            $table->foreignId('questioner_id')->constrained('participants')->onDelete('cascade');
            $table->foreignId('respondent_id')->constrained('participants')->onDelete('cascade');
            $table->integer('question_number')->nullable();
            $table->string('subject')->nullable();
            $table->longText('question_text')->nullable();
            $table->longText('answer_text')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qa_records');
    }
};
