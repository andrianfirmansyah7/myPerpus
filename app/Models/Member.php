<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = "member";
    protected $fillable = ['id', 'nama_member', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'id_akun','jenis_membership'];
}
