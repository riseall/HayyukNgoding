<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    use HasFactory;

    protected $table = 'telepon';
    protected $primaryKey = 'id_peserta';
    protected $fillable = ['id_peserta', 'nomor_telepon'];

    public function peserta(){
        return $this->belongsTo('App\Models\data_peserta', 'id');
    }
}
