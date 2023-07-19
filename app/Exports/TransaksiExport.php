<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Transaksi;

class TransaksiExport implements FromView
{
    public function view(): View
    {
        return view('exports.transaksi', [
            'data' => Transaksi::with('user.user','user.penempatan', 'spp')->where('status_pembayaran', 2)->get()
        ]);
    }
}
