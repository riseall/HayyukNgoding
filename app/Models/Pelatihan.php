<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = "pelatihan";

    public function data_peserta(){
        return $this->belongsTo('App\Models\DataPeserta', 'id_peserta' );
    }

    public function data_kelas(){
        return $this->belongsTo('App\Models\DataKelas', 'id_kelas' );
    }
}
