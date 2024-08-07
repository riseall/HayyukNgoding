@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
              <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Data Pelatihan</h4>
                    <p align="right"><a href="{{route('data_pelatihan.create')}}" class="btn btn-primary">Tambah Data Pelatihan</a></p>
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Peserta</th>
                            <th>Nama Kelas</th>
                            <th>Tanggal Pelatihan</th>
                            <th>Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_pelatihan as $pelatihan)
                        <tr>
                            <td>{{ $pelatihan->id}}</td>
                            <td>{{ $pelatihan->kode_transaksi}}</td>
                            <td><a href="{{ route('pelatihan.detail_peserta', $pelatihan->data_peserta['id']) }}">{{ ($pelatihan->data_peserta['nama_peserta']) }}</a></td>
                            <td><a href="{{ route('pelatihan.detail_kelas', $pelatihan->data_kelas['id']) }}">{{ $pelatihan->data_kelas['nama_kelas'] }}</a></td>
                            <td>{{ $pelatihan->tanggal_pelatihan}}</td>
                            <td>{{ $pelatihan->tanggal_selesai}}</td>
                        </tr>
                        @endforeach
                    </tbody>    
                  </table>
                <div class="pull_left">
                    <strong>
                        Jumlah Pelatihan : {{ $jumlah_pelatihan }}
                    </strong>
                </div>
                </div>
              </div>
          </div>
        </div>
    </div>
@endsection    