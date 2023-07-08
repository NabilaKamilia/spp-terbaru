<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Transaksi;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::with('user.user', 'spp')->get();
        // dd($data);
        return view('pages.admin.transaksi.index', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            //code...
            DB::beginTransaction();
            // dd($request->all());
            $request['created_at'] = date('Y-m-d H:i:s');
            $request['updated_at'] = date('Y-m-d H:i:s');
            $request['kode_pembayaran'] = 'TRX' . date('YmdHis', strtotime('+7 hours'));
            $request['waktu_transaksi'] = date('Y-m-d H:i:s', strtotime('+7 hours'));
            $request['status_pembayaran'] = 1;
            $request['tarif_spp_id'] = $request->spp;
            $data = Transaksi::create($request->all());
            self::showSnapToken($data->id);
            DB::commit();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            return redirect()->route('transaksi.index')->with('error', 'Transaksi gagal ditambahkan : ' . $th->getMessage());
        }
    }

    public function show(Orders $order)
    {
        $snapToken = $order->snap_token;
        $user = Auth::user();
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database

            $midtrans = new CreateSnapTokenService($order, $user);
            $snapToken = $midtrans->getSnapToken();
            $order->snap_token = $snapToken;
            $order->save();
        }
    }

    public function showSnaptoken($id)
    {
        DB::beginTransaction();
        $order = Transaksi::with('user', 'spp')->find($id);
        $user = Auth::user();
        $snapToken = $order->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
            $midtrans = new CreateSnapTokenService($order, $user);
            $snapToken = $midtrans->getSnapToken();
            // dd($snapToken);
            $order->snap_token = $snapToken;
            $order->save();
        }
        DB::commit();
    }
}
