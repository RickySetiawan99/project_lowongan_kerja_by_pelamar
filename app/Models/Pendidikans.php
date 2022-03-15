<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikans extends Model
{
    use HasFactory;
    //protected $connection = 'connection-name'; //jika menggunakan 2 DB modelnya harus dikasih ini
    // protected $primaryKey = 'kegiatan_id'; // set primarykeymu jika bukan ID
    protected $table = 'master_pendidikans';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
    //public $incrementing = false; //jika primary keynya string
    //public $timestamps = false; //matiin created_at, updated_at
}
