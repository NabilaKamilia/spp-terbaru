<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenempatanKelas extends Model
{
    use HasFactory;

    protected $table = 'penempatan_kelas';

    protected $fillable = [
        'kelas_id',
        'nisn',
        'tahun_ajaran'
    ];

    /**
     * Get the kelas a with the PenempatanKelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }

    /**
     * Get the siswa associated with the PenempatanKelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nisn', 'nisn');
    }
}
