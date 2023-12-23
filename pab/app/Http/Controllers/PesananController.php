<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Midtrans\CreateSnapToken;

class PesananController extends Controller
{
    public function create()
    {
        return view('pesanan.create');
    }

    public function store(Request $request)
    {
        $pesanan = $request->all();
        $pesanan['tanggal_pesan'] = Carbon::today();
        $pesanan['tanggal_bayar'] = Carbon::today();
        $service = new CreateSnapToken($pesanan);
        $token = $service->getSnaptoken();
        $pesanan['token'] = $token;
        $pesanan = Pesanan::create($pesanan);
        return view('pesanan.checkout', ['pesanan' => $pesanan]);
    }

}
