<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongans extends Model
{
    use HasFactory;

      //protected $connection = 'connection-name'; //jika menggunakan 2 DB modelnya harus dikasih ini
    // protected $primaryKey = 'kegiatan_id'; // set primarykeymu jika bukan ID
    protected $table = 'lowongans';
    protected $fillable = [
        'posisi_id',
        'pendidikan_id',
        'gaji',
        'keterangan',
        'tgl_pasang',
        'tgl_akhir',
        'syarat',
        'umur_min',
        'umur_max',
        'perusahaan_id',
    ];
    //public $incrementing = false; //jika primary keynya string
    //public $timestamps = false; //matiin created_at, updated_at

    // public function posisi(){
        
    //     return $this->belongsTo(Master\JobPosisi::class, 'posisi_id', 'id'); 

    // }

    public function pendidikan(){
        
        return $this->belongsTo(Pendidikans::class, 'pendidikan_id', 'id'); 

    }

    public function perusahaan(){
        
        return $this->belongsTo(Perusahaans::class, 'perusahaan_id', 'id'); 

    }
}
