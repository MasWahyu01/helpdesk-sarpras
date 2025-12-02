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
    Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            // Relasi ke user (pelapor)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Relasi ke kategori
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            
            $table->string('title'); // Judul laporan
            $table->text('description'); // Detail kerusakan
            $table->string('image')->nullable(); // Foto bukti (bisa kosong)
            
            // Status laporan: Pending -> Proses -> Selesai
            $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending');
            
            // Tanggapan dari Admin/Sarpras
            $table->text('admin_response')->nullable(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
