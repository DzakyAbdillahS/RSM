<?php

namespace App\Http\Controllers;

use App\Models\DetailMonitoring;
use App\Models\JenisMonitoring;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pekerjaan::all();
        return view('page.pekerjaan.Pekerjaan',[
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.pekerjaan.TambahPekerjaan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePekerjaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'pekerjaan'=>'required',
            'lokasi'=>'required',
            'no_kontrak'=>'required',
            'tgl'=>'required'
        ]);

        Pekerjaan::create([
            'pekerjaan'=>$request->pekerjaan,
            'lokasi'=>$request->lokasi,
            'no_kontrak'=>$request->no_kontrak,
            'tgl'=>$request->tgl
        ]);

        $pekerjaan = Pekerjaan::orderBy('id', 'desc')->first();

        //MDU PLN
        JenisMonitoring::create([
            'nama'=> 'MDU PLN',
            'id_pekerjaan'=> $pekerjaan->id
        ]);

        //Non MDU Tiang Besi
        JenisMonitoring::create([
            'nama'=> 'Non MDU Tiang Besi',
            'id_pekerjaan'=> $pekerjaan->id
        ]);

        //MDU Tiang Beton
        JenisMonitoring::create([
            'nama'=> 'Non MDU Tiang Beton',
            'id_pekerjaan'=> $pekerjaan->id
        ]);

        //MDU PLN Gardu
        JenisMonitoring::create([
            'nama'=> 'MDU PLN Gardu',
            'id_pekerjaan'=> $pekerjaan->id
        ]);

        //Non MDU PLN Gardu
        JenisMonitoring::create([
            'nama'=> 'Non MDU PLN Gardu',
            'id_pekerjaan'=> $pekerjaan->id
        ]);
        return redirect('/pekerjaan')->with('success', 'Pekerjaan Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerjaan $pekerjaan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePekerjaanRequest  $request
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pekerjaan=Pekerjaan::find($id);
        $pekerjaan->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }
}
