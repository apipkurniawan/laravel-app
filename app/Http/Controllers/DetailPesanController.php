<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailPesan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DetailPesanController extends Controller
{
    public function store(Request $request)
    {
        // Simpan ke table pemesanan
        $tambah_pemesanan=new Pemesanan;
        $tambah_pemesanan->no_pesan = $request->no_pesan;
        $tambah_pemesanan->tgl_pesan = $request->tgl;
        $tambah_pemesanan->total = $request->total;
        $tambah_pemesanan->kd_supp = $request->supp;
        $tambah_pemesanan->save();
        // Simpan data ke table detail pesan
        $kd_brg = $request->kd_brg;
        $qty= $request->qty_pesan;
        $sub_total= $request->sub_total;
        foreach($kd_brg as $key => $no)
        {
            $input['no_pesan'] = $request->no_pesan;
            $input['kd_brg'] = $kd_brg[$key];
            $input['qty_pesan'] = $qty[$key];
            $input['subtotal'] = $sub_total[$key];
            DetailPesan::insert($input);
        }
        alert()->success('Informasi', 'Transaksi berhasil disimpan')->toToast();
        return redirect('/transaksi');
    }
}
