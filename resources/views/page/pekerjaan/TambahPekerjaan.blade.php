@extends('layouts.template')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1 class="mb-3">Tambah Pekerjaan Baru</h1>
        <div class="row mb-2">
            <div class="col">
                <div class="card">
                    <form method="POST", action="{{ route('pekerjaan.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan">
                                <div class="text-danger">
                                    @error('pekerjaan')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi">
                                <div class="text-danger">
                                    @error('lokasi')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_kontrak">No Kontrak</label>
                                <input type="text" class="form-control @error('no_kontrak') is-invalid @enderror" id="no_kontrak" name="no_kontrak">
                                <div class="text-danger">
                                    @error('no_kontrak')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal</label>
                                <input type="date" style="width: 150px" class="form-control @error('tgl') is-invalid @enderror" id="tgl" name="tgl">
                                <div class="text-danger">
                                    @error('tgl')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->


@endsection
