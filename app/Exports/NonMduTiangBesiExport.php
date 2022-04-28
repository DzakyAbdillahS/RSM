<?php

namespace App\Exports;

use App\Models\DetailMonitoring;
use \Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class NonMduTiangBesiExport implements FromCollection
{
    private $id;

    function __construct($id_jenis_monitoring) {
        $this->id_jenis_monitoring = $id_jenis_monitoring;
    }

    public function collection()
    {
        return new Collection($this->id_jenis_monitoring);
    }
}
