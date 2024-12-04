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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('kontak'); 
            $table->integer('umur');
            $table->enum('jenis_kelamin', ['Perempuan', 'Laki-laki']);
            $table->text('deskripsi'); 
            $table->string('noHp')->nullable(); 
            $table->string('alamat'); 
            $table->string('jenjang'); 
            $table->date('tglLahir'); 
            $table->string('foto_profil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
