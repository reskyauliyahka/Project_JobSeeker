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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyedia_id')->constrained('users')->onDelete('cascade');
            $table->string('pekerjaan');
            $table->string('lokasi');
            $table->enum('typePekerjaan', ['full-time', 'part-time', 'freelance']);
            $table->string('kontak');
            $table->text('syaratPekerjaan');
            $table->string('rentangGaji');
            $table->string('perusahaan');
            $table->string('jenjangKarir');
            $table->string('fungsi');
            $table->string('deskripsi');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
