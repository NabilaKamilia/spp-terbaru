<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'tarif_spp_id',
        'order_id',
        'mdrfee',
        'waktu_transaksi',
        'kode_pembayaran',
        'status_pembayaran',
        'snap_token'
    ];

    /**
     * Get the user associated with the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
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
