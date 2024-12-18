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
        Schema::create('production_scientifique', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('authors');
            $table->date('date');
            $table->string('conference_or_journal');
            $table->unsignedBigInteger('internship_or_research_id');
            $table->string('pdf_file');
            $table->timestamps();

            $table->foreign('internship_or_research_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_scientifique');
    }
};
