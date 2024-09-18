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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul_berita');
            $table->text('konten_berita');
            $table->string('kategori_berita');
            $table->string('gambar');
            $table->integer('jumlah_views');
            $table->string('author');
            $table->enum('is_headline', ['no', 'yes']);
            $table->enum('is_berita_pilihan', ['no', 'yes']);
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
