<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Models\JenisMonitoring;
use App\Models\DetailMonitoring;
use Illuminate\Routing\Controller;

class JenisMonitoringController extends Controller
{
    public function index($id)
    {
        $datas = Pekerjaan::where('id',$id)->get();
        $jeniss = JenisMonitoring::where('id_pekerjaan', $id)->get();
        $details = DetailMonitoring::where('id_jenis_monitoring', $id)->get();

        return view('page.monitoring.MduPln',[
            'datas'=>$datas,
            'jeniss'=>$jeniss,
            'details'=>$details
        ]);
    }

}
