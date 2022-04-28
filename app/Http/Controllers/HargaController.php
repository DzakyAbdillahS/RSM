<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Harga::all();
        return view('page.harga.Harga',[
            'datas'=>$datas
        ]);
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
        $request -> validate([
            'nama'=>'required',
            'harga'=>'required'
        ]);

        Harga::create([
            'nama'=>$request->nama,
            'harga'=>$request->harga
        ]);

        return redirect()->back()->with('success', 'Material Berhasil Ditambah!');
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
        $data = $request->all();
        $detail = Harga::find($id);
        $detail->update([
            'harga'=>$data['harga'],
        ]);
        return redirect()->back()->with('success', 'Harga Material Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $harga = Harga::find($id);
        // $harga->delete();
        // return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }
}
