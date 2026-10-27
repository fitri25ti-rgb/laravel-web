<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata_1075';

    protected $fillable = [
        'nama_lengkap', 
        'alamat', 
        'tanggal_lahir', 
        'no_hp',
        'photo',
        'pendidikan',
        'hobi',
        'agama',
        'golongan_darah',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'anak_ke'
    ];
}