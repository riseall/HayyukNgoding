@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Data Peserta</h4>
                        <p class="card-category">Edit your profile</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('data_peserta.update', $peserta->id) }}"  enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>Kode Peserta</label>
                                <input style="background-color: #202940;" type="text" name="kode_peserta" readonly class="form-control" value="{{ $peserta->kode_peserta }}" >
                            </div>
                            <div class="form-group">
                                <label>Nama peserta</label>
                                <input type="text" name="nama_peserta" class="form-control" value="{{ $peserta->nama_peserta }}" >
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <select name="id_jenis_kelamin" class="form-control">
                                    <option style="background-color: #232a3f;" value="">Pilih Jenis Kelamin</option>
                                    @foreach ($list_jenis_kelamin as $key => $value)
                                    <option style="background-color: #232a3f;" value="{{ $key }}" {{$peserta->id_jenis_kelamin == $key ? 'selected' : ''}} >
                                        {{ $value }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $peserta->tanggal_lahir }}" >
                            </div>
                            <div class="form-group">
                                <label >Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" value="{{ $peserta->pekerjaan }}">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" name="nomor_telepon" class="form-control" value="{{ $peserta->nomor_telepon }}">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div> -->
                            <div>
                                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            </div>     
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
