<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = ["no_isbn","nama_buku","penulis","penerbit","tahun_terbit","ikhtisar","genre","jumlah_halaman"];
}
