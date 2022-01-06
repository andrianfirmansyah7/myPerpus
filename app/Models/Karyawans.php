<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawans extends Model
{
    use HasFactory;
    protected $table = "karyawans";
    protected $fillable = ['id', 'nama_karyawan', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'id_akun'];
}
