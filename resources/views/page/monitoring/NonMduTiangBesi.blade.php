@extends('layouts.template')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="text-center mt-1 mb-2 text-bold">Monitoring</h1>
                <h5 class="text-center mt-1 mb-3 text-bold">Non MDU Tiang Besi</h5>
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

                <button id="tambah_uraian" data-toggle="modal" data-target="#modal-create" class="btn btn-primary btn-md mt-3">+ Tambah Uraian Pekerjaan</button>
                {{-- <a href="{{ route('NonMduTiangBesi.excelNonMduTiangBesi', $id_non_mdu_tiang_besi) }}" class="btn btn-success mt-3 ml-2">Excel</a> --}}

            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            {{-- <div class="col-lg-11">


            </div>
            <div class="col-lg-1">
                <a class="btn btn-success mt-4">Print</a>
            </div> --}}
        </div>
        <div class="row">
            <div class="col">
                <table id="tbl_non_mdu_tiang_besi" class="display nowrap" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Uraian Pekerjaan</th>
                        <th scope="col" class="text-center">Satuan</th>
                        <th scope="col" class="text-center">Volume</th>
                        <th scope="col" class="text-center">UNP</th>
                        <th scope="col" class="text-center">ARM BRACE</th>
                        <th scope="col" class="text-center">D. ARMING</th>
                        <th scope="col" class="text-center">CLM JPT 5" 4 LBG</th>
                        <th scope="col" class="text-center">BAUT 1/2x2</th>
                        <th scope="col" class="text-center">CLMP BEUGLE 7-8"</th>
                        <th scope="col" class="text-center">CLM JPT 5" 3 LBG</th>
                        <th scope="col" class="text-center">ANCHOR</th>
                        <th scope="col" class="text-center">SLING</th>
                        <th scope="col" class="text-center">PINEX 3/8</th>
                        <th scope="col" class="text-center">SPANSCROF 12"</th>
                        <th scope="col" class="text-center">TUI TM</th>
                        <th scope="col" class="text-center">KAOS BAJA</th>
                        <th scope="col" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
                            <td class="text-center">{{ $detail->uraian_pekerjaan }}</td>
                            <td class="text-center">{{ $detail->satuan }}</td>
                            <td class="text-center">{{ $detail->volume }}</td>
                            @if ($detail->uraian_pekerjaan==='Konstr. Penarikan JTM 3 Phasa  A3C 150 mm2')
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            @endif

                            @if ($detail->uraian_pekerjaan==='Konstruksi Tiang Penyangga pd T. Besi (TM-1)')
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*2 }}</td>
                            <td class="text-center">{{ null}}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*6 }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            @endif

                            @if ($detail->uraian_pekerjaan==='Konst. T.Penyangga Ganda pd T. Besi (TM-2)')
                            <td class="text-center">{{ $detail->volume*2 }}</td>
                            <td class="text-center">{{ $detail->volume*4 }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*5 }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            @endif

                            @if ($detail->uraian_pekerjaan==='Pemas.Konstruksi Tiang Tarik Akhir pd T.Besi (TM-4)')
                            <td class="text-center">{{ $detail->volume*2 }}</td>
                            <td class="text-center">{{ $detail->volume*2 }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*4 }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            @endif

                            @if ($detail->uraian_pekerjaan==='Konstruksi Tiang Tarik Ganda T. Besi (TM-5)')
                            <td class="text-center">{{ $detail->volume*2 }}</td>
                            <td class="text-center">{{ $detail->volume*2 }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*5 }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            @endif

                            @if ($detail->uraian_pekerjaan==='Konst. Percab. pd. T. Existing T. Besi (TM-7)')
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            @endif

                            @if ($detail->uraian_pekerjaan==='Down Guy/Trekschoor komplit T. Besi (E-1)')
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*11 }}</td>
                            <td class="text-center">{{ $detail->volume*8 }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*1 }}</td>
                            <td class="text-center">{{ $detail->volume*2 }}</td>
                            @endif

                            @if ($detail->uraian_pekerjaan==='Kons. Tiang Besi 12 Meter - 350 daN')
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            <td class="text-center">{{ null }}</td>
                            @endif

                            <td>
                                <div class="row" style="width: 100px">
                                    <a class="btn btn-primary btn-sm mr-1"  data-toggle="modal" data-target="#modal-edit-{{ $detail->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm mr-1"  data-toggle="modal" data-target="#modal-delete-{{ $detail->id }}">
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
                                            <form method="POST" action="{{ route('NonMduTiangBesi.update', $detail->id) }}" enctype="multipart/form-data">
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
                                                        <input type="hidden" value="{{ $detail->id_jenis_monitoring }}" class="form-control" id="id_jenis_monitoring" name="id_jenis_monitoring">
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
                                            <form action="{{ route('NonMduTiangBesi.destroy', $detail->id) }}" method="POST">
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
                    <tfoot>
                        {{-- <tr>
                            <th scope="col" class="text-center"> </th>
                            <th scope="col" class="text-center"> </th>
                            <th scope="col" class="text-center">Jumlah: </th>
                            <th scope="col" class="text-center"> </th>
                            <th scope="col" class="text-center">{{ $m1 }}</th>
                            <th scope="col" class="text-center">{{ $m2 }}</th>
                            <th scope="col" class="text-center">{{ $m3 }}</th>
                            <th scope="col" class="text-center">{{ $m4 }}</th>
                            <th scope="col" class="text-center">{{ $m5 }}</th>
                            <th scope="col" class="text-center">{{ $m6 }}</th>
                            <th scope="col" class="text-center">{{ $m7 }}</th>
                            <th scope="col" class="text-center">{{ $m8 }}</th>
                            <th scope="col" class="text-center">{{ $m9 }}</th>
                            <th scope="col" class="text-center">{{ $m10 }}</th>
                            <th scope="col" class="text-center">{{ $m11 }}</th>
                            <th scope="col" class="text-center">{{ $m12 }}</th>
                            <th scope="col" class="text-center">{{ $m13 }}</th>
                            <th scope="col" class="text-center"></th>
                        </tr> --}}
                        <tr>
                            <th scope="col" class="text-center"> </th>
                            <th scope="col" class="text-center"> </th>
                            <th scope="col" class="text-center">Total Harga: </th>
                            <th scope="col" class="text-center"> </th>
                            <th scope="col" class="text-center">@currency($h1*$m1)</th>
                            <th scope="col" class="text-center">@currency($h2*$m2)</th>
                            <th scope="col" class="text-center">@currency($h3*$m3)</th>
                            <th scope="col" class="text-center">@currency($h4*$m4)</th>
                            <th scope="col" class="text-center">@currency($h5*$m5)</th>
                            <th scope="col" class="text-center">@currency($h6*$m6)</th>
                            <th scope="col" class="text-center">@currency($h7*$m7)</th>
                            <th scope="col" class="text-center">@currency($h8*$m8)</th>
                            <th scope="col" class="text-center">@currency($h9*$m9)</th>
                            <th scope="col" class="text-center">@currency($h10*$m10)</th>
                            <th scope="col" class="text-center">@currency($h11*$m11)</th>
                            <th scope="col" class="text-center">@currency($h12*$m12)</th>
                            <th scope="col" class="text-center">@currency($h13*$m13)</th>
                            <th scope="col" class="text-center"></th>
                        </tr>
                    </tfoot>

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
            <form method="POST" action="{{ route('NonMduTiangBesi.store', [$jenis->id_pekerjaan, $id_non_mdu_tiang_besi]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <div class="form-group">
                        <label for="uraian_pekerjaan">Uraian Pekerjaan</label>
                        <select name="uraian_pekerjaan" class="form-control @error('uraian_pekerjaan') is-invalid @enderror">
                            <option selected disabled hidden>Pilih Uraian Pekerjaan</option>
                            <option value="Konstr. Penarikan JTM 3 Phasa  A3C 150 mm2">Konstr. Penarikan JTM 3 Phasa  A3C 150 mm2</option>
                            <option value="Konstruksi Tiang Penyangga pd T. Besi (TM-1)">Konstruksi Tiang Penyangga pd T. Besi (TM-1)</option>
                            <option value="Konst. T.Penyangga Ganda pd T. Besi (TM-2)">Konst. T.Penyangga Ganda pd T. Besi (TM-2)</option>
                            {{-- <option value="Konstruksi Tiang Awal/Akhir Besi (TM-3">Konstruksi Tiang Awal/Akhir Besi (TM-3)</option> --}}
                            <option value="Pemas.Konstruksi Tiang Tarik Akhir pd T.Besi (TM-4)">Pemas.Konstruksi Tiang Tarik Akhir pd T.Besi (TM-4)</option>
                            <option value="Konstruksi Tiang Tarik Ganda T. Besi (TM-5)">Konstruksi Tiang Tarik Ganda T. Besi (TM-5)</option>
                            <option value="Konst. Percab. pd. T. Existing T. Besi (TM-7)">Konst. Percab. pd. T. Existing T. Besi (TM-7)</option>
                            {{-- <option value="Konstruksi Percabangan T. Besi (TM-8)">Konstruksi Percabangan T. Besi (TM-8)</option>
                            <option value="Konst.Tiang Belokan / Sudut T. Besi (TM-10)">Konst.Tiang Belokan / Sudut T. Besi (TM-10)</option>
                            <option value="Konstruksi Tiang Opstijg Cable pd T. Besi (TM-11)">Konstruksi Tiang Opstijg Cable pd T. Besi (TM-11)</option>
                            <option value="Konst. Portal/Single-Arm 2 T. Besi (TM-16)">Konst. Portal/Single-Arm 2 T. Besi (TM-16)</option>
                            <option value="Konst. Portal/Double-Arm 2 T. Besi (TM-16A)">Konst. Portal/Double-Arm 2 T. Besi (TM-16A)</option> --}}
                            <option value="Down Guy/Trekschoor komplit T. Besi (E-1)">Down Guy/Trekschoor komplit T. Besi (E-1)</option>
                            {{-- <option value="Down Guy/Trekschoor Douuble komplit T.Besi (E-1D)">Down Guy/Trekschoor Douuble komplit T.Besi (E-1D)</option>
                            <option value="Span Guy / Kontramast komplit T. Besi (E-2)">Span Guy / Kontramast komplit T. Besi (E-2)</option>
                            <option value="Span Guy / Kontramast Double komplit T.Besi (E-2D)">Span Guy / Kontramast Double komplit T.Besi (E-2D)</option>
                            <option value="Strut Pole / Drugschoor komplit T. Beton (E-3)">Strut Pole / Drugschoor komplit T. Beton (E-3)</option>
                            <option value="Kons. Tiang Besi 9 Meter - 200 daN">Kons. Tiang Besi 9 Meter - 200 daN</option>
                            <option value="Kons. Tiang Besi 11 Meter - 200 daN">Kons. Tiang Besi 11 Meter - 200 daN</option>
                            <option value="Kons. Tiang Besi 12 Meter - 200 daN">Kons. Tiang Besi 12 Meter - 200 daN</option> --}}
                            <option value="Kons. Tiang Besi 12 Meter - 350 daN">Kons. Tiang Besi 12 Meter - 350 daN</option>
                            {{-- <option value="Kons. Tiang Besi 13 Meter - 200 daN">Kons. Tiang Besi 13 Meter - 200 daN</option>
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
                            <option value="Pemasangan ARM Brace">Pemasangan ARM Brace</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select name="satuan" class="form-control @error('uraian_pekerjaan') is-invalid @enderror">
                            <option selected disabled hidden>Pilih Satuan</option>
                            {{-- <option>Btg</option> --}}
                            <option>Kms</option>
                            {{-- <option>Set</option> --}}
                            <option>Unit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="volume">Volume</label>
                        <input type="number" class="form-control" id="volume" name="volume">
                    </div>
                    <div class="form-group">
                        {{-- <label for="id_jenis_monitoring">Id Jenis Monitoring</label> --}}
                        <input type="hidden" value="{{ $id_non_mdu_tiang_besi }}" class="form-control" id="id_jenis_monitoring" name="id_jenis_monitoring">
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
