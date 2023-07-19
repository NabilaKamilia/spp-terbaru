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
        'kelas_id',
        'user_id',
        'alamat',
        'no_hp',
        'status'
    ];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }



    /**
     * Get the user associated with the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
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
