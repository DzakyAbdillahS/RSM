@extends('layouts.template')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="text-center mt-2 mb-3 text-bold">Harga Material</h1>

                {{-- <h6>Pekerjaan : {{ $pekerjaan }}</h6>
                <h6>Lokasi : {{ $lokasi }}</h6>
                <h6>No Kontrak : {{ $no_kontrak }}</h6>
                <h6>Tanggal : {{ $tgl }}</h6> --}}

                {{-- <button data-toggle="modal" data-target="#modal-create" class="btn btn-primary btn-md mt-3">Tambah </button>
                <a href="#" class="btn btn-success mt-3 ml-2">Excel</a> --}}

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
                <table  id="tbl_harga" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Harga</th>
                        <th scope="col" class="text-center">Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $data->nama }}</td>
                                <td>@currency($data->harga)</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#modal-edit-{{ $data->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- <a class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#modal-delete-{{ $data->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a> --}}
                                    </div>
                                    <div class="modal fade" id="modal-edit-{{ $data->id }}">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Edit Uraian Pekerjaan</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('harga-material.update', $data->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form">
                                                        @method('put')
                                                        {{-- <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') ?? $data->nama }}">
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label for="harga">Harga</label>
                                                            <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga') ?? $data->harga }}">
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

                                    {{-- <div class="modal fade" id="modal-delete-{{ $data->id }}">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">

                                            <div class="modal-body">
                                              <h4 class="text-center mt-1">Yakin Ingin Menghapus <br/> Data Ini?</h4>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <form action="{{ route('harga-material.destroy',$data->id) }}" method="POST">
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
                                      <!-- /.modal --> --}}
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
          <h5 class="modal-title">Tambah Material</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('harga-material.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="number" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga">
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
