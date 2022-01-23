<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjamans extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    protected $fillable = ['peminjam','buku','awal_peminjaman','akhir_peminjaman','status'];
}
