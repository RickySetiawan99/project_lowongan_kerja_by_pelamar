<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaans extends Model
{
    use HasFactory;
    //protected $connection = 'connection-name'; //jika menggunakan 2 DB modelnya harus dikasih ini
    // protected $primaryKey = 'kegiatan_id'; // set primarykeymu jika bukan ID
    protected $table = 'perusahaans';
    protected $fillable = [
        'nama',
        'brand',
        'no_regis_usaha',
        'jenis_usaha',
        'sektor_industri',
        'alamat',
        'provinsi_id',
        'kabupaten_id',
        'kode_pos',
        'no_telp',
        'email',
        'password',
        'keterangan',
        'is_approve',
        'user_id'
    ];
    //public $incrementing = false; //jika primary keynya string
    //public $timestamps = false; //matiin created_at, updated_at
}
