<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Models\JenisMonitoring;
use App\Models\DetailMonitoring;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NonMduTiangBesiExport;
use App\Models\Harga;
use App\Models\Material;

class NonMduTiangBesiController extends Controller
{
    public function index($id, $id_jenis_monitoring)
    {

        $datas = Pekerjaan::where('id', $id)->get();
        $jenis = JenisMonitoring::where('id_pekerjaan', $id)->first();
        $id_non_mdu_tiang_besi = $jenis->id+1;
        $details = DetailMonitoring::where('id_jenis_monitoring', $id_jenis_monitoring)->get();
        // $detail = DetailMonitoring::orderBy('id_jenis_monitoring', 'desc')->first()->id;

        //Material
        $m1 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'UNP')
            ->sum('volume');
        $m2 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'ARM BRACE')
            ->sum('volume');
        $m3 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'D. ARMING')
            ->sum('volume');
        $m4 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'CLM JPT 5" 4 LBG')
            ->sum('volume');
        $m5 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'BAUT 1/2x2')
            ->sum('volume');
        $m6 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'CLMP BEUGLE 7-8"')
            ->sum('volume');
        $m7 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'CLM JPT 5" 3 LBG')
            ->sum('volume');
        $m8 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'ANCHOR')
            ->sum('volume');
        $m9 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'SLING')
            ->sum('volume');
        $m10 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'PINEX 3/8')
            ->sum('volume');
        $m11 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'SPANSCROF 12"')
            ->sum('volume');
        $m12 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'TUI TM')
            ->sum('volume');
        $m13 = Material::where('id_jenis_monitoring', $id_jenis_monitoring)
            ->where('nama', 'KAOS BAJA')
            ->sum('volume');


        //Harga Material
        $h1 = Harga::where('nama', 'UNP')->value('harga');
        $h2 = Harga::where('nama', 'ARM BRACE')->value('harga');
        $h3 = Harga::where('nama', 'D. ARMING')->value('harga');
        $h4 = Harga::where('nama', 'CLM JPT 5" 4 LBG')->value('harga');
        $h5 = Harga::where('nama', 'BAUT 1/2x2')->value('harga');
        $h6 = Harga::where('nama', 'CLMP BEUGLE 7-8"')->value('harga');
        $h7 = Harga::where('nama', 'CLM JPT 5" 3 LBG')->value('harga');
        $h8 = Harga::where('nama', 'ANCHOR')->value('harga');
        $h9 = Harga::where('nama', 'SLING')->value('harga');
        $h10 = Harga::where('nama', 'PINEX 3/8')->value('harga');
        $h11 = Harga::where('nama', 'SPANSCROF 12"')->value('harga');
        $h12 = Harga::where('nama', 'TUI TM')->value('harga');
        $h13 = Harga::where('nama', 'KAOS BAJA')->value('harga');

        //Total Harga Material
        // $hm1 = $h1*$m1;
        // $hm2 = $h2*$m2;
        // $hm3 = $h3*$m3;
        // $hm4 = $h4*$m4;
        // $hm5 = $h5*$m5;
        // $hm6 = $h6*$m6;
        // $hm7 = $h7*$m7;
        // $hm8 = $h8*$m8;
        // $hm9 = $h9*$m9;
        // $hm10 = $h10*$m10;
        // $hm11 = $h11*$m11;
        // $hm12 = $h12*$m12;
        // $hm13 = $h13*$m13;

        return view('page.monitoring.NonMduTiangBesi',[
            'datas'=>$datas,
            'jenis'=>$jenis,
            'details'=>$details,
            'id_non_mdu_tiang_besi'=>$id_non_mdu_tiang_besi,
            //Material
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
            //Harga Material
            'h1'=>$h1,
            'h2'=>$h2,
            'h3'=>$h3,
            'h4'=>$h4,
            'h5'=>$h5,
            'h6'=>$h6,
            'h7'=>$h7,
            'h8'=>$h8,
            'h9'=>$h9,
            'h10'=>$h10,
            'h11'=>$h11,
            'h12'=>$h12,
            'h13'=>$h13,
        ]);
        // $datas = Pekerjaan::where('id', $id)->get();
        // $nama_monitoring = JenisMonitoring::findOrFail($id)->first()->nama;
        // dd($nama_monitoring);
        // $details = DetailMonitoring::where('id_jenis_monitoring', $id)->get();

        // return view('page.monitoring.NonMduTiangBesi',[
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
                'nama'=>'UNP',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'ARM BRACE',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'CLM JPT 5" 4 LBG',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BAUT 1/2x2',
                'volume'=>$request->volume*6,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'CLMP BEUGLE 7-8"',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
        }

        if($request->uraian_pekerjaan==='Konst. T.Penyangga Ganda pd T. Besi (TM-2)')
        {
            Material::create([
                'nama'=>'UNP',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'ARM BRACE',
                'volume'=>$request->volume*4,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'CLM JPT 5" 4 LBG',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BAUT 1/2x2',
                'volume'=>$request->volume*5,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
        }

        if($request->uraian_pekerjaan==='Pemas.Konstruksi Tiang Tarik Akhir pd T.Besi (TM-4)')
        {
            Material::create([
                'nama'=>'UNP',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'ARM BRACE',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'D. ARMING',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'CLM JPT 5" 4 LBG',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BAUT 1/2x2',
                'volume'=>$request->volume*4,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
        }

        if($request->uraian_pekerjaan==='Konstruksi Tiang Tarik Ganda T. Besi (TM-5)')
        {
            Material::create([
                'nama'=>'UNP',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'ARM BRACE',
                'volume'=>$request->volume*2,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'D. ARMING',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'CLM JPT 5" 4 LBG',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'BAUT 1/2x2',
                'volume'=>$request->volume*5,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
        }

        if($request->uraian_pekerjaan==='Down Guy/Trekschoor komplit T. Besi (E-1)')
        {
            Material::create([
                'nama'=>'CLM JPT 5" 3 LBG',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'ANCHOR',
                'volume'=>$request->volume*1,
                'id_jenis_monitoring'=>$detail->id_jenis_monitoring,
                'id_detail_monitoring'=>$detail->id
            ]);
            Material::create([
                'nama'=>'SLING',
                'volume'=>$request->volume*11,
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
                'nama'=>'SPANSCROF 12"',
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

    public function excelNonMduTiangBesi($id)
    {
        return Excel::download(new NonMduTiangBesiExport($id), 'NonMduTiangBesi.xlsx');
    }
}
