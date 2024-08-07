<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'mhs'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'agama',
        'alamat',
        'no_hp',
        'program_studi',
        'jalur_masuk',
        'foto',
        'status',
        'id_user',
    ];
}
