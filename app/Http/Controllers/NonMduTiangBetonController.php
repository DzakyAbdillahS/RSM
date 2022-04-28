<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Models\JenisMonitoring;
use App\Models\DetailMonitoring;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NonMduTiangBetonExport;

class NonMduTiangBetonController extends Controller
{
    public function index($id, $id_jenis_monitoring)
    {

        $datas = Pekerjaan::where('id', $id)->get();
        $jenis = JenisMonitoring::where('id_pekerjaan', $id)->first();
        $id_non_mdu_tiang_beton = $jenis->id+2;
        $details = DetailMonitoring::where('id_jenis_monitoring', $id_jenis_monitoring)->get();
        // $detail = DetailMonitoring::orderBy('id_jenis_monitoring', 'desc')->first()->id;
        $m1 = Material::where('nama', 'UNP HODIP ')->sum('volume');
        $m2 = Material::where('nama', 'PLAT LAYANG')->sum('volume');
        $m3 = Material::where('nama', 'D. ARMING 5/8')->sum('volume');
        $m4 = Material::where('nama', 'MUR+RING 5/8')->sum('volume');
        $m5 = Material::where('nama', 'BAUT 5/8x2')->sum('volume');
        $m6 = Material::where('nama', 'BEUGLE 8"')->sum('volume');
        $m7 = Material::where('nama', 'ANCHOR')->sum('volume');
        $m8 = Material::where('nama', 'SLING 8"')->sum('volume');
        $m9 = Material::where('nama', 'PINEX 3/8')->sum('volume');
        $m10 = Material::where('nama', 'SPANSCROF 16"')->sum('volume');
        $m11 = Material::where('nama', 'TUI TM')->sum('volume');
        $m12 = Material::where('nama', 'KAOS BAJA')->sum('volume');
        $m13 = Material::where('nama', 'BETON BLOK')->sum('volume');
        $m14 = Material::where('nama', 'TUSUK KONDE')->sum('volume');

        return view('page.monitoring.NonMduTiangBeton',[
            'datas'=>$datas,
            'jenis'=>$jenis,
            'details'=>$details,
            'id_non_mdu_tiang_beton'=>$id_non_mdu_tiang_beton,
            'm1'=>$m1,
            'm2'=>$m2,
            'm3'=>$m3,
            'm4'=>$m4,
            'm5'=>$m5,
            'm6'=>$m6,
            'm7'=>$m7,
            'm8'=>$m8,
            'm9'=>$m9,
            'm10'=>$m10,
            'm11'=>$m11,
            'm12'=>$m12,
            'm13'=>$m13,
            'm14'=>$m14,
        ]);
        // $datas = Pekerjaan::where('id', $id)->get();
        // $nama_monitoring = JenisMonitoring::findOrFail($id)->first()->nama;
        // dd($nama_monitoring);
        // $details = DetailMonitoring::where('id_jenis_monitoring', $id)->get();

        // return view('page.monitoring.NonMduTiangBeton',[
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
        $detail = DetailMonitoring::orderBy('id', 'desc')->first();

        if($request->uraian_pekerjaan==='Konstruksi Tiang Penyangga pd T. Besi (TM-1)')
        {
            Material::create([
                'nama'=>'UNP HODIP',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'PLAT LAYANG',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BAUT 5/8x2',
                'volume'=>$request->volume*6,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BEUGLE 8"',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
        }

        if($request->uraian_pekerjaan==='Konst. T.Penyangga Ganda pd T. Besi (TM-2)')
        {
            Material::create([
                'nama'=>'UNP HODIP',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'PLAT LAYANG',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'D. ARMING 5/8',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'MUR+RING 5/8',
                'volume'=>$request->volume*6,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BAUT 5/8x2',
                'volume'=>$request->volume*5,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BEUGLE 8"',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
        }

        if($request->uraian_pekerjaan==='Pemas.Konstruksi Tiang Tarik Akhir pd T.Besi (TM-4)')
        {
            Material::create([
                'nama'=>'UNP HODIP',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'PLAT LAYANG',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'D. ARMING 5/8',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'MUR+RING 5/8',
                'volume'=>$request->volume*6,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BAUT 5/8x2',
                'volume'=>$request->volume*4,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BEUGLE 8"',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
        }

        if($request->uraian_pekerjaan==='Konstruksi Tiang Tarik Ganda T. Besi (TM-5)')
        {
            Material::create([
                'nama'=>'UNP HODIP',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'PLAT LAYANG',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'D. ARMING 5/8',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'MUR+RING 5/8',
                'volume'=>$request->volume*6,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BAUT 5/8x2',
                'volume'=>$request->volume*5,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BEUGLE 8"',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
        }

        if($request->uraian_pekerjaan==='Down Guy/Trekschoor komplit T. Besi (E-1)')
        {
            Material::create([
                'nama'=>'ANCHOR',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'SLING 8"',
                'volume'=>$request->volume*18,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'PINEX 3/8',
                'volume'=>$request->volume*8,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'SPANSCROF 16"',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'TUI TM',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'KAOS BAJA',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BETON BLOK',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'TUSUK KONDE',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);

        }

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

    public function excelNonMduTiangBeton($id)
    {
        return Excel::download(new NonMduTiangBetonExport($id), 'NonMduTiangBeton.xlsx');
    }
}
