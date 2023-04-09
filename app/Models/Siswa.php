<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\User;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'NISN',
        'jenis_kelamin',
        'kelas_id',
        'user_id',
        
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}
