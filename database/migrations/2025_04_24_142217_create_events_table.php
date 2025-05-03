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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title'); // Nama Event
            $table->string('type'); // Jenis Event
            $table->date('date'); // Tanggal Acara
            $table->integer('participant_estimate'); // Estimasi Jumlah Peserta
            $table->string('location'); // Lokasi
            $table->string('contact_name'); // Nama CP
            $table->string('contact_position'); // Posisi di Event
            $table->string('contact_whatsapp'); // No. Whatsapp CP
            $table->text('description'); // Deskripsi Event
            $table->string('poster')->nullable(); // Upload Poster Event
            $table->string('proposal')->nullable(); // Upload Proposal Event
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
