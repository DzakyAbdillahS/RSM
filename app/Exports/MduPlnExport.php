<?php

namespace App\Exports;


use App\Models\DetailMonitoring;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MduPlnExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct(int $id_jenis_monitoring)
    {
        $this->id_jenis_monitoring = $id_jenis_monitoring;
    }

    public function query()
    {
        return DetailMonitoring::query()->where('id_jenis_monitoring', $this->id_jenis_monitoring);
    }

    public function model(array $row)
    {
        return new DetailMonitoring([
            'uraian_pekerjaan'  => $row['uraian_pekerjaan'],
            'satuan' => $row['satuan'],
            'volume' => $row['volume'],
        ]);
    }

    public function headings(): array
    {
        return [
            'Uraian Pekerjaan',
            'Satuan',
            'Volume'
        ];
    }

    public function map($mdu): array
    {
        return [
            $mdu->uraian_pekerjaan,
            $mdu->satuan,
            $mdu->volume
        ];
    }



}
