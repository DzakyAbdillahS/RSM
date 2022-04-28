<div class="row">
    <div class="col">
        <table  id="tbl_mdu_pln" class="display" style="width:100%">
            <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Uraian Pekerjaan</th>
                <th scope="col" class="text-center">Satuan</th>
                <th scope="col" class="text-center">Volume</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $detail->uraian_pekerjaan }}</td>
                        <td>{{ $detail->satuan }}</td>
                        <td>{{ $detail->volume }}</td>
                    </tr>
                @endforeach

            </tbody>
          </table>
