@extends('layouts.template')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="text-center mt-1 mb-2 text-bold">Monitoring</h1>
                <h5 class="text-center mt-1 mb-3 text-bold">MDU PLN Gardu</h5>
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
                <a href="{{ route('MduPlnGardu.excelMduPlnGardu', $id_mdu_pln_gardu) }}" class="btn btn-success mt-3 ml-2">Excel</a>

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
                <table id="tbl_mdu_pln_gardu" class="display nowrap" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Uraian Pekerjaan</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Volume</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
                            <td class="text-center">{{ $detail->uraian_pekerjaan }}</td>
                            <td class="text-center">{{ $detail->satuan }}</td>
                            <td class="text-center">{{ $detail->volume }}</td>
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
                                            <form method="POST" action="{{ route('MduPlnGardu.update', $detail->id) }}" enctype="multipart/form-data">
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
                                            <form action="{{ route('MduPlnGardu.destroy', $detail->id) }}" method="POST">
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
            <form method="POST" action="{{ route('MduPlnGardu.store', [$jenis->id_pekerjaan, $id_mdu_pln_gardu]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <div class="form-group">
                        <label for="uraian_pekerjaan">Uraian Pekerjaan</label>
                        <select name="uraian_pekerjaan" class="form-control @error('uraian_pekerjaan') is-invalid @enderror">
                            <option selected disabled hidden>Pilih Uraian Pekerjaan</option>
                            <option value="Pas. Trafo 3 Phasa 50 KVA/20 KV/B2">Pas. Trafo 3 Phasa 50 KVA/20 KV/B2</option>
                            <option value="Pas. Trafo 3 Phasa 100 KVA/20 KV/B2">Pas. Trafo 3 Phasa 100 KVA/20 KV/B2</option>
                            <option value="Pas. Trafo 3 Phasa 160 KVA/20 KV/B2">Pas. Trafo 3 Phasa 160 KVA/20 KV/B2</option>
                            <option value="Pas. Trafo 3 Phasa 200 KVA/20 KV/B2">Pas. Trafo 3 Phasa 200 KVA/20 KV/B2</option>
                            <option value="Kons. Tiang Besi 12 Meter - 350 daN :">Kons. Tiang Besi 12 Meter - 350 daN :</option>
                            <option value="Pengecatan  Tiang besi 12 M - 350 daN">Pengecatan  Tiang besi 12 M - 350 daN</option>
                            <option value="Pas. Konstruksi Platfrom Tansfomator Gardu Portal">Pas. Konstruksi Platfrom Tansfomator Gardu Portal</option>
                            <option value="Pas. LS Board 2 Jurusan Gardu Portal">Pas. LS Board 2 Jurusan Gardu Portal</option>
                            <option value="Pas. LS Board 4 Jurusan Gardu Portal">Pas. LS Board 4 Jurusan Gardu Portal</option>
                            <option value="Pas. Cut Out + Fuse Link + jamper U/Gardu">Pas. Cut Out + Fuse Link + jamper U/Gardu</option>
                            <option value="Pas. Lightning Arrester + Jamper U/Gardu">Pas. Lightning Arrester + Jamper U/Gardu</option>
                            <option value="Pemasangan Kabel Induk Gardu (NYY 150 mm2)">Pemasangan Kabel Induk Gardu (NYY 150 mm2)</option>
                            <option value="Pemasangan Kabel Jurusan (NYY 70 mm2)">Pemasangan Kabel Jurusan (NYY 70 mm2)</option>
                            <option value="Grounding / Pentanahan  Gardu  ( GTR )">Grounding / Pentanahan  Gardu  ( GTR )</option>
                            <option value="Pondasi trafo Tiang Portal (Cor Beton 1:2:3 ) Uk. 280x50x30 cm">Pondasi trafo Tiang Portal (Cor Beton 1:2:3 ) Uk. 280x50x30 cm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select name="satuan" class="form-control @error('uraian_pekerjaan') is-invalid @enderror">
                            <option selected disabled hidden>Pilih Satuan</option>
                            <option>Btg</option>
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
                        <input type="hidden" value="{{ $id_mdu_pln_gardu }}" class="form-control" id="id_jenis_monitoring" name="id_jenis_monitoring">
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
