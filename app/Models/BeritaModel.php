<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $fillable = ['judul_berita', 'konten_berita, kategori_berita, is_headline, is_berita_pilihan' ,'gambar'];
}
