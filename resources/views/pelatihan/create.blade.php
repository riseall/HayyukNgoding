@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
              <div class="row">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Tambah Data Pelatihan</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action=" {{ route('pelatihan.store') }} ">
                        @csrf
                            <div class="form-group">
                                <label> Kode Pelatihan </label>
                                <input type="text" name="kode_transaksi" class="form-control">
                                <input type="hidden" name="tgl_pelatihan" class="form-control" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="tgl_selesai" class="form-control" value="{{ date('Y-m-d', strtotime('+30 day', strtotime(date('Y-m-d')))) }}">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Peserta</label>
                                <select name="id_peserta" class="form-control" style="background-color: #202940;">
                                    <option value="">Pilih Nama Peserta</option>
                                        @foreach ($list_data_peserta as $key => $value)
                                    <option value="{{ $key }}">
                                        {{ $value }}
                                    </option>
                                        @endforeach        
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kelas</label>
                                <select name="id_kelas" class="form-control" style="background-color: #202940;">
                                    <option value="">Pilih kelas</option>
                                        @foreach ($list_data_kelas as $key => $value)
                                    <option value="{{ $key }}">
                                        {{ $value }}
                                    </option>    
                                        @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary pull-right" >Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection            