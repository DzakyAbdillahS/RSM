@extends('layouts.template')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="text-center mt-2 mb-3 text-bold">Daftar Pekerjaan</h1>
                <a href="{{ route('pekerjaan.create') }}" class="btn btn-primary btn-md mb-2">+ Tambah Pekerjaan Baru</a>
                {{-- <button type="button" class="btn btn-success btn-md mb-2" >Excel</button>
                <button type="button" class="btn btn-secondary btn-md mb-2" >PDF</button> --}}

                <table id="tbl_pekerjaan" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">No Kontrak</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>

                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $data->pekerjaan}}</td>
                                <td>{{ $data->lokasi }}</td>
                                <td>{{ $data->no_kontrak }}</td>
                                <td>{{ date('d-F-Y', strtotime($data->tgl)) }}</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-primary btn-sm mr-1" href="{{ route('monitoring.index', $data->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#modal-sm-{{ $data->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    <div class="modal fade" id="modal-sm-{{ $data->id }}">
                                        <div class="modal-dialog modal-sm">
                                          <div class="modal-content">

                                            <div class="modal-body">
                                              <h4 class="text-center mt-1">Yakin Ingin Menghapus <br/> Data Ini?</h4>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <form action="{{ route('pekerjaan.destroy',$data->id) }}" method="POST">
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
             </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->

@endsection




