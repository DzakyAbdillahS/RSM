<?php

namespace App\Http\Controllers;

use App\Models\DetailMonitoring;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Models\JenisMonitoring;

class MonitoringController extends Controller
{
    public function index($id)
    {
        $datas = Pekerjaan::where('id', $id)->get();
        $jeniss = JenisMonitoring::where('id_pekerjaan', $id)->get();
        $details = DetailMonitoring::where('id_jenis_monitoring', $id)->get();

        return view('page.monitoring.Monitoring',[
            'datas'=>$datas,
            'jeniss'=>$jeniss,
            'details'=>$details
            // 'pekerjaan'=>$data->pekerjaan,
            // 'lokasi'=>$data->lokasi,
            // 'no_kontrak'=>$data->no_kontrak,
            // 'tgl'=>$data->tgl
        ]);
    }


}
