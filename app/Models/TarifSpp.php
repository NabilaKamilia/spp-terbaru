<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifSpp extends Model
{
    use HasFactory;

    protected $table = 'tarif_spp';

    protected $fillable = [
        'bulan',
        'nominal',
    ];
}
