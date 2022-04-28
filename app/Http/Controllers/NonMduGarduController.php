<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Models\JenisMonitoring;
use App\Models\DetailMonitoring;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NonMduGarduExport;

class NonMduGarduController extends Controller
{
    public function index($id, $id_jenis_monitoring)
    {

        $datas = Pekerjaan::where('id', $id)->get();
        $jenis = JenisMonitoring::where('id_pekerjaan', $id)->first();
        $id_non_mdu_gardu = $jenis->id+4;
        $details = DetailMonitoring::where('id_jenis_monitoring', $id_jenis_monitoring)->get();
        // $detail = DetailMonitoring::orderBy('id_jenis_monitoring', 'desc')->first()->id;
        return view('page.monitoring.NonMduGardu',[
            'datas'=>$datas,
            'jenis'=>$jenis,
            'details'=>$details,
            'id_non_mdu_gardu'=>$id_non_mdu_gardu

        ]);
        // $datas = Pekerjaan::where('id', $id)->get();
        // $nama_monitoring = JenisMonitoring::findOrFail($id)->first()->nama;
        // dd($nama_monitoring);
        // $details = DetailMonitoring::where('id_jenis_monitoring', $id)->get();

        // return view('page.monitoring.NonMduGardu',[
        //     'datas'=>$datas,
        //     'nama_monitoring'=>$nama_monitoring,
        //     'details'=>$details
        // ]);

    }

    public function create(){

    }

    public function store(Request $request)
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

        return redirect()->back()->with('success', 'Uraian Pekerjaan Berhasil Ditambah!');
    }

    public function edit(){

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

    public function excelNonMduGardu($id)
    {
        return Excel::download(new NonMduGarduExport($id), 'NonMduGardu.xlsx');
    }
}
