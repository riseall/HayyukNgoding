@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
              <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Data Peserta</h4>

                    @include('_partial/flash_message')

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
                            <!-- <th>Foto</th> -->
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
                            <!-- <td>
                                @if(empty($peserta->foto))
                                <img src="{{ asset('foto_peserta/pas_foto_kosong.png') }}" alt="" style="width: 50px;height: 60px;">
                                @else
                                <img src="{{ asset('foto_peserta/'.$peserta->foto) }}" alt="" style="width: 50px;height: 60px;">
                                @endif
                            </td> -->
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
                    <strong>
                        Jumlah Peserta : {{ $jumlah_peserta }}
                    </strong>
                    <p>{{ $data_peserta->links() }}</p>
                </div>
                </div>
              </div>
          </div>
        </div>
    </div>
@endsection    