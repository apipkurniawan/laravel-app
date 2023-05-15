<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun=Akun::All();
        return view('admin.akun.akun',['akun'=>$akun]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.akun.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk menyimpan data
        $tambah_akun=new Akun;
        $tambah_akun->no_akun = $request->addnoakun;
        $tambah_akun->nm_akun = $request->addnmakun;
        $tambah_akun->save(); // method
        alert()->success('Data Created', 'Data akun berhasil disimpan')->toToast();
        return redirect('/akun'); // prosedur
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
        $akun_edit=Akun::findOrFail($id);
        return view('admin.akun.edit',['akun'=>$akun_edit]);
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
        $update_akun = Akun::findOrFail($id);
        $update_akun->no_akun=$request->addnoakun;
        $update_akun->nm_akun=$request->addnmakun;
        $update_akun->save();
        alert()->success('Data Updated', 'Data akun berhasil diubah')->toToast();
        return redirect()->route( 'akun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_akun)
    {
        $akun=Akun::findOrFail($no_akun);
        $akun->delete();
        alert()->success('Data Deleted', 'Data akun berhasil dihapus')->toToast();
        return redirect()->route('akun.index');
    }
}
