@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4>Data User</h4>
                    <p align="right"><a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Data User</a></p>      
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            @foreach($user_list as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user -> name }}</td>
                                <td>{{ $user -> email }}</td>
                                <td>{{ $user -> level }}</td>
                                <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                        @csrf
                                            <button class="btn btn-warning btn-sm"
                                                onClick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')" >Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-left">
                        <strong>
                            Jumlah Peserta : {{ $jumlah_user }}
                        </strong>
                        <p>{{ $user_list->links() }}</p>
                    </div>
                </div>
            </div>        
        </div>
    </div>

@endsection