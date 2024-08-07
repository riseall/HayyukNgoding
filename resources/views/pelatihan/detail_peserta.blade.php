@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
              <div class="card">
                <div class="card-body table-responsive">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Detail Peserta</h4>
                </div>
                <p>Kode Peserta : {{ $data_peserta->kode_peserta }} </p>
                <p>Nama Peserta : {{ $data_peserta->nama_peserta }} </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas Yang Sedang dipelajari</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($data_peserta->data_kelas as $item)
                        <tr style="background-color: #202940;">
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>

@endsection