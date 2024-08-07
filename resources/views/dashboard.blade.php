@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
              <div class="card">
                <div class="card-body table-responsive">
                    <h2 class="text-white">
                        @if(Auth::check())
                        <strong>{{ 'Selamat Datang, '. Auth::user()->name.'!'}}</strong>
                        @else
                        @endif
                    </h2>
                    <p class="mb-3 text-white">Semoga Aktivitas belajarmu menyenangkan.</p>
              </div>
          </div>
        </div>
    </div>
@endsection