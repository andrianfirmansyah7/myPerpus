<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensis extends Model
{
    use HasFactory;
    protected $table = "presensis";
    protected $fillable = ['karyawan', 'presensi_masuk', 'presensi_keluar', 'status_kehadiran'];
}
