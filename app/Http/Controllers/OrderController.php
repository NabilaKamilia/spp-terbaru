<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Services\Midtrans\CallbackService;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Traits\Response;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use Response;

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

        return view('test.test', compact('order', 'snapToken'));
    }

    public function showSnaptoken($id)
    {
        $order = Orders::find($id);
        $user = Auth::user();
        $snapToken = $order->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
            $midtrans = new CreateSnapTokenService($order, $user);
            $snapToken = $midtrans->getSnapToken();
            $order->snap_token = $snapToken;
            $order->save();
        }

        return $this->success($order, 'Order Token Berhasil Disimpan');
    }
}
