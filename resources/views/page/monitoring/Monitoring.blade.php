@extends('layouts.template')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="text-center mt-2 mb-4 text-bold">Monitoring Pekerjaan</h1>

                @foreach ($datas as $data)

                <table>
                    <tbody>
                        <tr>
                            <td><h6 class="text-bold">Pekerjaan</h6></td>
                            <td><h6 class="text-bold"> &nbsp  :    &nbsp</h6></td>
                            <td><h6>{{ $data->pekerjaan }}</h6></td>
                        </tr>
                        <tr>
                            <td><h6 class="text-bold">Lokasi</h6></td>
                            <td><h6 class="text-bold"> &nbsp  :    &nbsp</h6></td>
                            <td><h6>{{ $data->lokasi }}</h6></td>
                        </tr>
                        <tr>
                            <td><h6 class="text-bold">No Kontrak</h6></td>
                            <td><h6 class="text-bold"> &nbsp  :    &nbsp</h6></td>
                            <td><h6>{{ $data->no_kontrak }}</h6></td>
                        </tr>
                        <tr>
                            <td><h6 class="text-bold">Tanggal</h6></td>
                            <td><h6 class="text-bold"> &nbsp  :    &nbsp</h6></td>
                            <td><h6>{{ $data->tgl }}</h6></td>
                        </tr>
                    </tbody>
                </table>
                @endforeach

            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-lg">
                <table id="tbl_monitoring" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Monitoring</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jeniss as $jenis)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $jenis->nama}}</td>
                                <td>
                                    <div class="row">
                                        @if ($jenis->nama=='MDU PLN')
                                            <a class="btn btn-primary btn-sm mr-1" href="{{ route('MduPln.index', [$data->id, $jenis->id]) }}">
                                                Detail
                                            </a>
                                            @elseif ($jenis->nama=='Non MDU Tiang Besi')
                                            <a class="btn btn-primary btn-sm mr-1" href="{{ route('NonMduTiangBesi.index',[$data->id, $jenis->id]) }}">
                                                Detail
                                            </a>
                                            @elseif ($jenis->nama=='Non MDU Tiang Beton')
                                            <a class="btn btn-primary btn-sm mr-1" href="{{ route('NonMduTiangBeton.index',[$data->id, $jenis->id]) }}">
                                                Detail
                                            </a>
                                            @elseif ($jenis->nama=='MDU PLN Gardu')
                                            <a class="btn btn-primary btn-sm mr-1" href="{{ route('MduPlnGardu.index',[$data->id, $jenis->id]) }}">
                                                Detail
                                            </a>
                                            @elseif ($jenis->nama=='Non MDU PLN Gardu')
                                            <a class="btn btn-primary btn-sm mr-1" href="{{ route('NonMduGardu.index',[$data->id, $jenis->id]) }}">
                                                Detail
                                            </a>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->

@endsection
