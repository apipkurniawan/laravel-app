<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang=Barang::All();
        return view('admin.barang.barang',['barang'=>$barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_barang=new Barang;
        $tambah_barang->kd_brg = $request->addkdbrg;
        $tambah_barang->nm_brg = $request->addnmbrg;
        $tambah_barang->harga = $request->addharga;
        $tambah_barang->stok = $request->addstok;
        $tambah_barang->save();
        alert()->success('Data Created', 'Data barang berhasil disimpan')->toToast();
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang_edit=Barang::findOrFail($id);
        return view('admin.barang.editBarang',['barang'=>$barang_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang=Barang::findOrFail($id);
        $barang->kd_brg=$request->get('addkdbrg');
        $barang->nm_brg=$request->get('addnmbrg');
        $barang->harga=$request->get('addharga');
        $barang->stok=$request->get('addstok');
        $barang->save();
        alert()->success('Data Updated', 'Data barang berhasil diubah')->toToast();
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $kd_brg
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_brg)
    {
        $barang=Barang::findOrFail($kd_brg);
        $barang->delete();
        alert()->success('Data Deleted', 'Data barang berhasil dihapus')->toToast();
        return redirect()->route('barang.index');
    }
}
