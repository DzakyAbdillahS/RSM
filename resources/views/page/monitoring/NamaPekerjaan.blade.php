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
                    {{-- <h5><b>Pekerjaan   : </b>{{ $data->pekerjaan }}</h5>
                    <h5><b>Lokasi      : </b>{{ $data->lokasi }}</h5>
                    <h5><b>No Kontrak  : </b>{{ $data->no_kontrak }}</h5>
                    <h5><b>Tanggal     : </b>{{ $data->tgl }}</h5> --}}
                @endforeach
