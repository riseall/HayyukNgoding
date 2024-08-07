@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body table-responsive">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Detail Kelas</h4>
                </div>
                    <p>Kode Kelas : {{ $data_kelas->kode_kelas }} </p>
                    <p>Nama Kelas : {{ $data_kelas->nama_kelas }} </p>
                    <p>Deskripsi : {{ $data_kelas->deskripsi }} </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($data_kelas->data_peserta as $item)
                            <tr style="background-color: #202940;">
                                <td>{{ $i }}</td>
                                <td>{{ $item->nama_peserta }}</td>
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