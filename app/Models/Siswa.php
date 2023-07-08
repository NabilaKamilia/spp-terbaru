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

    protected $primaryKey = 'nisn';

    public $incrementing = 'false';

    protected $fillable = [
        'nisn',
        'jenis_kelamin',
        'TahunAjaran',
        'kelas_id',
        'user_id',
<<<<<<< HEAD
=======

        
>>>>>>> fe494c96cb37f7c923dcd4a479e002d0f077d1c7
    ];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the penempatan associated with the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function penempatan()
    {
        return $this->hasOne(PenempatanKelas::class, 'nisn', 'nisn');
    }
}
