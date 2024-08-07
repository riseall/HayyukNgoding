@extends('layout.master')
@section('content')

@if(count($data_peserta))
    <div class="container-fluid">
        <div class="row">
              <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Data Peserta</h4>

                    @include('_partial/flash_message')

                    <p align="right"><a href="{{route('data_peserta.create')}}" class="btn btn-primary">Tambah Data Peserta</a></p>
                    <form action="{{ route('data_peserta.search') }}" method="get">@csrf
                        <input type="text" name="kata" placeholder="Cari...">
                    </form>
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Peserta</th>
                            <th>Nama Peserta</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Pekerjaan</th>
                            <th>Telepon</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_peserta as $peserta)
                        <tr>
                            <td>{{ $peserta->id}}</td>
                            <td>{{ $peserta->kode_peserta}}</td>
                            <td>{{ $peserta->nama_peserta}}</td>
                            <td>{{ $peserta->jenis_kelamin['nama_jenis_kelamin']}}</td>
                            <td>{{ $peserta->tanggal_lahir}}</td>
                            <td>{{ $peserta->pekerjaan}}</td>
                            <td>{{ !empty($peserta->telepon['nomor_telepon'])?
                                    $peserta->telepon['nomor_telepon'] : '-'
                                }}
                            </td>
                            <td><a href="{{ route('data_peserta.edit', $peserta->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                            <td>
                                <form action="{{ route('data_peserta.destroy', $peserta->id) }}" method="POST">
                                    @csrf
                                        <button class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>    
                  </table>
                <div class="pull_left">
                    <p>{{ $data_peserta->links() }}</p>
                </div>
                </div>
              </div>
          </div>
        </div>
    </div>

@else
    <div>
        <h4>Data {{ $cari }} tidak ditemukan </h4>
        <a href="/data_peserta">Kembali</a>
    </div>
@endif
@endsection    