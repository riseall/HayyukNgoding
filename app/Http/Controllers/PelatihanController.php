<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelatihan;
use App\Models\DataPeserta;
use App\Models\DataKelas;

class PelatihanController extends Controller
{
    public function index(){
        $data_pelatihan = Pelatihan::all()->sortBy('id');
        $jumlah_pelatihan = $data_pelatihan->count();
        return view('pelatihan.index', compact('data_pelatihan','jumlah_pelatihan'));
    }

    public function create(){
        $list_data_peserta = DataPeserta::pluck('nama_peserta','id');
        $list_data_kelas = DataKelas::pluck('nama_kelas','id');
        return view('pelatihan.create', compact('list_data_peserta','list_data_kelas'));
    }

    public function store(Request $request){
        $pelatihan = new Pelatihan;
        $pelatihan->kode_transaksi = $request->kode_transaksi;
        $pelatihan->id_peserta = $request->id_peserta;
        $pelatihan->id_kelas = $request->id_kelas;
        $pelatihan->tgl_pelatihan = $request->tgl_pelatihan;
        $pelatihan->tgl_selesai = $request->tgl_selesai;
        $pelatihan->save();

        return redirect('pelatihan');
    }

    public function detail_peserta($id){
        $halaman = 'data_peserta';
        $data_peserta = DataPeserta::findOrFail($id);
        return view('pelatihan.detail_peserta', compact('halaman', 'data_peserta'));
    }
    public function detail_kelas($id){
        $halaman = 'data_kelas';
        $data_kelas = DataKelas::findOrFail($id);
        return view('pelatihan.detail_kelas', compact('halaman', 'data_kelas'));
    }
}
