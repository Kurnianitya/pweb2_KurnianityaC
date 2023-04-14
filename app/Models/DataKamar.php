<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKamar extends Model
{
    protected $table = "data_kamar";
    protected $primaryKey ="id";
    protected $fillable = [
        'id','nomor','kapasitas','fasilitas','biaya'
    ];
}
