@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Tambah Data Peserta</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>

                    <div class="card-body">
                        @if (count($errors) > 0)
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('data_peserta.store') }}" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" class="form-control" value="{{ $user_id }}">
                        @csrf
                            <div class="form-group">
                                <label >Kode Peserta</label>
                                <input type="text" name="kode_peserta" class="form-control">
                            </div>  
                            <div class="form-group">
                                <label >Nama Peserta</label>
                                <input type="text" name="nama_peserta" class="form-control">
                            </div>   
                            <div class="form-group">
                                <label >Jenis Kelamin</label>
                                <select name="id_jenis_kelamin" class="form-control">
                                    <option style="background-color: #232a3f;" value="">Pilih Jenis Kelamin</option>
                                        @foreach ($list_jenis_kelamin as $key => $value)
                                    <option style="background-color: #232a3f;" value="{{ $key }}">
                                        {{ $value }}
                                    </option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label >Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label >Telepon</label>
                                <input type="text" name="telepon" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="foto" class="form-control">
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