@extends('layouts.template')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="text-center mt-1 mb-2 text-bold">Monitoring</h1>
                <h5 class="text-center mt-1 mb-3 text-bold">MDU PLN</h5>

                {{-- <h6>Pekerjaan : {{ $pekerjaan }}</h6>
                <h6>Lokasi : {{ $lokasi }}</h6>
                <h6>No Kontrak : {{ $no_kontrak }}</h6>
                <h6>Tanggal : {{ $tgl }}</h6> --}}

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

                <button data-toggle="modal" data-target="#modal-create" class="btn btn-primary btn-md mt-3">+ Tambah Uraian Pekerjaan</button>
                <a href="{{ route('MduPln.excelmdupln', $jenis->id) }}" class="btn btn-success mt-3 ml-2">Excel</a>

                {{-- @foreach ($jenis as $jenis)
                    <a href="{{ route('monitoring.index', $jenis->id_pekerjaan) }}">{{ $jenis->nama }}</a>
                @endforeach --}}

            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-lg-11">
                <div class="form-group">

                </div>

            </div>

        </div>
        <div class="row">
            <div class="col">
                <table  id="tbl_mdu_pln" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Uraian Pekerjaan</th>
                        <th scope="col" class="text-center">Satuan</th>
                        <th scope="col" class="text-center">Volume</th>
                        <th scope="col" class="text-center">Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $detail->uraian_pekerjaan }}</td>
                                <td>{{ $detail->satuan }}</td>
                                <td>{{ $detail->volume }}</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#modal-edit-{{ $detail->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#modal-delete-{{ $detail->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    <div class="modal fade" id="modal-edit-{{ $detail->id }}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Edit Uraian Pekerjaan</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('MduPln.update', $detail->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form">
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label for="uraian_pekerjaan">Uraian Pekerjaan</label>
                                                            <input type="text" class="form-control" id="uraian_pekerjaan" name="uraian_pekerjaan" value="{{ old('uraian_pekerjaan') ?? $detail->uraian_pekerjaan }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="satuan">Satuan</label>
                                                            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ old('satuan') ?? $detail->satuan }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="volume">Volume</label>
                                                            <input type="number" class="form-control" id="volume" name="volume" value="{{ old('volume') ?? $detail->volume }}">
                                                        </div>
                                                        <div class="form-group">
                                                            {{-- <label for="id_jenis_monitoring">Id Jenis Monitoring</label> --}}
                                                            <input type="hidden" value="{{ $jenis->id }}" class="form-control" id="id_jenis_monitoring" name="id_jenis_monitoring">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</a>
                                                    </div>
                                                </form>
                                            </div>

                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                                    <div class="modal fade" id="modal-delete-{{ $detail->id }}">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">

                                            <div class="modal-body">
                                              <h4 class="text-center mt-1">Yakin Ingin Menghapus <br/> Data Ini?</h4>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <form action="{{ route('MduPln.destroy',$detail->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-md" type="submit">
                                                        YES
                                                    </button>
                                                </form>
                                            </div>
                                          </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                      <!-- /.modal -->
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

  {{-- Tambah Uraian Pekerjaan --}}
  <div class="modal fade" id="modal-create">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Uraian Pekerjaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('MduPln.store', [$jenis->id_pekerjaan, $jenis->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <div class="form-group">
                        <label for="uraian_pekerjaan">Uraian Pekerjaan</label>
                        <select name="uraian_pekerjaan" class="form-control @error('uraian_pekerjaan') is-invalid @enderror">
                            <option selected disabled hidden>Pilih Uraian Pekerjaan</option>
                            <option value="Konstr. Penarikan JTM 3 Phasa  A3C 150 mm2">Konstr. Penarikan JTM 3 Phasa  A3C 150 mm2</option>
                            <option value="Konstruksi Tiang Penyangga pd T. Besi (TM-1)">Konstruksi Tiang Penyangga pd T. Besi (TM-1)</option>
                            <option value="Konst. T.Penyangga Ganda pd T. Besi (TM-2)">Konst. T.Penyangga Ganda pd T. Besi (TM-2)</option>
                            <option value="Konstruksi Tiang Awal/Akhir Besi (TM-3">Konstruksi Tiang Awal/Akhir Besi (TM-3)</option>
                            <option value="Pemas.Konstruksi Tiang Tarik Akhir pd T.Besi (TM-4)">Pemas.Konstruksi Tiang Tarik Akhir pd T.Besi (TM-4)</option>
                            <option value="Konstruksi Tiang Tarik Ganda T. Besi (TM-5)">Konstruksi Tiang Tarik Ganda T. Besi (TM-5)</option>
                            <option value="Konst. Percab. pd. T. Existing T. Besi (TM-7)">Konst. Percab. pd. T. Existing T. Besi (TM-7)</option>
                            <option value="Konstruksi Percabangan T. Besi (TM-8)">Konstruksi Percabangan T. Besi (TM-8)</option>
                            <option value="Konst.Tiang Belokan / Sudut T. Besi (TM-10)">Konst.Tiang Belokan / Sudut T. Besi (TM-10)</option>
                            <option value="Konstruksi Tiang Opstijg Cable pd T. Besi (TM-11)">Konstruksi Tiang Opstijg Cable pd T. Besi (TM-11)</option>
                            <option value="Konst. Portal/Single-Arm 2 T. Besi (TM-16)">Konst. Portal/Single-Arm 2 T. Besi (TM-16)</option>
                            <option value="Konst. Portal/Double-Arm 2 T. Besi (TM-16A)">Konst. Portal/Double-Arm 2 T. Besi (TM-16A)</option>
                            <option value="Down Guy/Trekschoor komplit T. Besi (E-1)">Down Guy/Trekschoor komplit T. Besi (E-1)</option>
                            <option value="Down Guy/Trekschoor Douuble komplit T.Besi (E-1D)">Down Guy/Trekschoor Douuble komplit T.Besi (E-1D)</option>
                            <option value="Span Guy / Kontramast komplit T. Besi (E-2)">Span Guy / Kontramast komplit T. Besi (E-2)</option>
                            <option value="Span Guy / Kontramast Double komplit T.Besi (E-2D)">Span Guy / Kontramast Double komplit T.Besi (E-2D)</option>
                            <option value="Strut Pole / Drugschoor komplit T. Beton (E-3)">Strut Pole / Drugschoor komplit T. Beton (E-3)</option>
                            <option value="Kons. Tiang Besi 9 Meter - 200 daN">Kons. Tiang Besi 9 Meter - 200 daN</option>
                            <option value="Kons. Tiang Besi 11 Meter - 200 daN">Kons. Tiang Besi 11 Meter - 200 daN</option>
                            <option value="Kons. Tiang Besi 12 Meter - 200 daN">Kons. Tiang Besi 12 Meter - 200 daN</option>
                            <option value="Kons. Tiang Besi 12 Meter - 350 daN">Kons. Tiang Besi 12 Meter - 350 daN</option>
                            <option value="Kons. Tiang Besi 13 Meter - 200 daN">Kons. Tiang Besi 13 Meter - 200 daN</option>
                            <option value="Kons. Tiang Besi 13 Meter - 350 daN">Kons. Tiang Besi 13 Meter - 350 daN</option>
                            <option value="Kons. Tiang Besi 14 Meter - 350 daN">Kons. Tiang Besi 14 Meter - 350 daN</option>
                            <option value="Pengecatan  Tiang besi   9 M - 200 daN">Pengecatan  Tiang besi   9 M - 200 daN</option>
                            <option value="Pengecatan  Tiang besi 11 M - 200 daN">Pengecatan  Tiang besi 11 M - 200 daN</option>
                            <option value="Pengecatan  Tiang besi 12 M - 350 daN">Pengecatan  Tiang besi 12 M - 350 daN</option>
                            <option value="Pengecatan  Tiang besi 13 M - 200 daN">Pengecatan  Tiang besi 13 M - 200 daN</option>
                            <option value="Pengecatan  Tiang besi 13 M - 350 daN">Pengecatan  Tiang besi 13 M - 350 daN</option>
                            <option value="Pengecatan  Tiang besi 14 M - 350 daN">Pengecatan  Tiang besi 14 M - 350 daN</option>
                            <option value="Pas. Manchet Tiang besi   9 M - 200 daN">Pas. Manchet Tiang besi   9 M - 200 daN</option>
                            <option value="Pas. Manchet Tiang besi 11 M - 200 daN">Pas. Manchet Tiang besi 11 M - 200 daN</option>
                            <option value="Pas. Manchet Tiang besi 12 M - 200 daN">Pas. Manchet Tiang besi 12 M - 200 daN</option>
                            <option value="Pas. Manchet Tiang besi 12 M - 350 daN">Pas. Manchet Tiang besi 12 M - 350 daN</option>
                            <option value="Pas. Manchet Tiang besi 13 M - 200 daN">Pas. Manchet Tiang besi 13 M - 200 daN</option>
                            <option value="Pas. Manchet Tiang besi 13 M - 350 daN">Pas. Manchet Tiang besi 13 M - 350 daN</option>
                            <option value="Pas. Manchet Tiang besi 14 M - 350 daN">Pas. Manchet Tiang besi 14 M - 350 daN</option>
                            <option value="Tiang Pancang Biasa (Standard)">Tiang Pancang Biasa (Standard)</option>
                            <option value="Tiang Pancang Khusus Untuk Tiang Besi">Tiang Pancang Khusus Untuk Tiang Besi</option>
                            <option value="Pemasangan Penghalang Panjat  & Plat Tanda Bahaya">Pemasangan Penghalang Panjat  & Plat Tanda Bahaya</option>
                            <option value="Pemasangan ARM Brace">Pemasangan ARM Brace</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select name="satuan" class="form-control @error('uraian_pekerjaan') is-invalid @enderror">
                            <option selected disabled hidden>Pilih Satuan</option>
                            <option>Btg</option>
                            <option>Kms</option>
                            <option>Set</option>
                            <option>Unit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="volume">Volume</label>
                        <input type="number" class="form-control" id="volume" name="volume">
                    </div>
                    <div class="form-group">
                        {{-- <label for="id_jenis_monitoring">Id Jenis Monitoring</label> --}}
                        <input type="hidden" value="{{ $jenis->id }}" class="form-control" id="id_jenis_monitoring" name="id_jenis_monitoring">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

@endsection
