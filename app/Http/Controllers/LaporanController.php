<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date=date_create();
        $tglTrx= sprintf(date_format($date,"Y-m-d"));
        return view('laporan.laporan', ['tgl'=>$tglTrx]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        Log::info('opoooooo : '.$request);
        $periode=$request->get('periode');
        if ($periode == 'All') {
            $bb = Laporan::All();
            $akun=Akun::All();
            $pdf = PDF::loadview('laporan.cetak',['laporan'=>$bb,'akun' => $akun])->setPaper('A4','landscape');
            return $pdf->stream();
        } elseif ($periode == 'periode') {
            $tglawal=$request->get('tglawal');
            $tglakhir=$request->get('tglakhir');
            $akun=Akun::All();
            $bb=DB::table('jurnal')->whereBetween('tgl_jurnal', [$tglawal,$tglakhir])->orderby('tgl_jurnal','ASC')->get();
            $pdf = PDF::loadview('laporan.cetak',['laporan'=>$bb,'akun' => $akun])->setPaper('A4','landscape');
            return $pdf->stream();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
