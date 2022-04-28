<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Exports\MduPlnExport;
use App\Models\JenisMonitoring;
use App\Models\DetailMonitoring;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class MduPlnController extends Controller
{
    public function index($id, $id_jenis_monitoring)
    {
        $datas = Pekerjaan::where('id', $id)->get();
        //pekerjaan
        // $pekerjaan = Pekerjaan::findOrFail($id)->first()->pekerjaan;
        // $lokasi = Pekerjaan::findOrFail($id)->first()->lokasi;
        // $no_kontrak = Pekerjaan::findOrFail($id)->first()->no_kontrak;
        // $tgl = Pekerjaan::findOrFail($id)->first()->tgl;

        $jenis = JenisMonitoring::where('id_pekerjaan', $id)->first();
        // $id_jenis = JenisMonitoring::findOrFail($id)->first()->id;
        $details = DetailMonitoring::where('id_jenis_monitoring', $id_jenis_monitoring)->get();
        return view('page.monitoring.MduPln',[
            'datas'=>$datas,
            // 'nama_monitoring'=>$nama_monitoring,
            // 'id_jenis'=>$id_jenis,
            // 'pekerjaan'=>$pekerjaan,
            // 'lokasi'=>$lokasi,
            // 'no_kontrak'=>$no_kontrak,
            // 'tgl'=>$tgl,

            'jenis'=>$jenis,

            'details'=>$details
        ]);
    }


    public function create()
    {

    }

    public function store(Request $request, $id_jenis_monitoring)
    {
        $request->validate([
            'uraian_pekerjaan'=>'required',
            'satuan'=>'required',
            'volume'=>'required'
        ]);

        // dd($request->all());
        DetailMonitoring::create([
            'uraian_pekerjaan'=>$request->uraian_pekerjaan,
            'satuan'=>$request->satuan,
            'volume'=>$request->volume,
            'id_jenis_monitoring'=>$request->id_jenis_monitoring
        ]);

        return redirect()->back()->with('Success', 'Uraian Pekerjaan Berhasil Ditambah!');
    }

    public function edit($id)
    {
        // $detail = DetailMonitoring::find($id);
    }

    public function update(Request $request, $id)
    {
        $item = $request->all();
        $detail = DetailMonitoring::find($id);
        $detail->update([
            'uraian_pekerjaan'=>$item['uraian_pekerjaan'],
            'satuan'=>$item['satuan'],
            'volume'=>$item['volume'],
        ]);
        return redirect()->back()->with('success', 'Uraian Pekerjaan Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $detail = DetailMonitoring::find($id);
        $detail->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }


    // public function exportmdupln(Request $request)
    // {
    //     dd($request);
    //     return Excel::download(new MduPlnExport($request->id_jenis_monitoring), 'mdupln.xls');
    // }

    // public function exportmdupln()
    // {

    //     return Excel::download(new MduPlnExport, 'mdupln.xlsx');
    // }

    public function excelmdupln($id)
    {
        return Excel::download(new MduPlnExport($id), 'MduPln.xlsx');
    }
}
