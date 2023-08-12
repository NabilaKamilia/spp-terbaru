<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'nisn',
        'tarif_spp_id',
        'order_id',
        'mdrfee',
        'waktu_transaksi',
        'kode_pembayaran',
        'status_pembayaran',
        'snap_token',
        'nominal'
    ];

    /**
     * Get the user associated with the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(Siswa::class, 'nisn', 'nisn');
    }

    public function penempatan()
    {
        return $this->hasOne(PenempatanKelas::class, 'nisn', 'nisn');
    }

    /**
     * Get the spp associated with the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function spp()
    {
        return $this->hasOne(TarifSpp::class, 'id', 'tarif_spp_id');
    }
}
