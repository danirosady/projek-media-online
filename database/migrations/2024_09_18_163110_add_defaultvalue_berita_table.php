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
        Schema::table('berita', function (Blueprint $table) {
            $table->integer('jumlah_views')->default(0)->change();
            $table->enum('is_headline', ['no', 'yes'])->default('no')->change();
            $table->enum('is_berita_pilihan', ['no', 'yes'])->default('no')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
