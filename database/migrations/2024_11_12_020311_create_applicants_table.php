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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('pekerjaan_id')->constrained('job_posts')->onDelete('cascade');
            $table->timestamp('waktuLamaran');
            $table->enum('status', ['accepted', 'rejected', 'pending'])->default('pending');
            $table->string('resume_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
