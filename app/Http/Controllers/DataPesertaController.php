<?php

namespace App\Http\Controllers;

use App\Models\DataPeserta;
use Illuminate\Http\Request;
use App\Models\Telepon;
use App\Models\JenisKelamin;

use Session;
use Storage;
use App\Models\User;


class DataPesertaController extends Controller
{
    public function index(){
        $jumlah_peserta = DataPeserta::count();
        $data_peserta = DataPeserta::orderBy('id', 'asc')->paginate(5);
        $no = 0;
        return view('data_peserta.index', compact('data_peserta', 'no', 'jumlah_peserta'));
    }

    public function create(){
        $list_jenis_kelamin = JenisKelamin::pluck('nama_jenis_kelamin', 'id_jenis_kelamin');
        return view('data_peserta.create', compact('list_jenis_kelamin'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'kode_peserta' => 'required|string',
            'nama_peserta' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date'
        ]);

        $this->validate($request,[
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $foto_peserta = $request->foto;
        $nama_file = time().'.'.$foto_peserta->getClientOriginalExtension();
        $foto_peserta->move('foto_peserta/', $nama_file);

        $data_peserta = new DataPeserta;
        $data_peserta->kode_peserta = $request->kode_peserta;
        $data_peserta->nama_peserta = $request->nama_peserta;
        $data_peserta->id_jenis_kelamin = $request->id_jenis_kelamin;
        $data_peserta->tanggal_lahir = $request->tanggal_lahir;
        $data_peserta->pekerjaan = $request->pekerjaan;
        $data_peserta->foto = $nama_file;
        $data_peserta->user_id = $request->user_id;
        $data_peserta->save();

        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->telepon;
        $data_peserta->telepon()->save($telepon);

        Session::flash('flash_message', 'Data Peserta Berhasil disimpan');

        return redirect('data_peserta');
    }

    public function edit($id){
        $peserta = DataPeserta::find($id);
        if(!empty($peserta->telepon->nomor_telepon)){
            $peserta->nomor_telepon = $peserta->telepon->nomor_telepon;
        }
        $list_jenis_kelamin = JenisKelamin::pluck('nama_jenis_kelamin', 'id_jenis_kelamin');
        return view('data_peserta.edit', compact('peserta','list_jenis_kelamin'));
    }

    public function update(Request $request, $id){
        $data_peserta = DataPeserta::find($id);
        if($request->has('foto')){
            $foto_peserta = $request->foto;
            $nama_file = time().'.'.$foto_peserta->getClientOriginalExtension();
            $foto_peserta->move('foto_peserta/', $nama_file);
            $data_peserta->kode_peserta = $request->kode_peserta;
            $data_peserta->nama_peserta = $request->nama_peserta;
            $data_peserta->id_jenis_kelamin = $request->id_jenis_kelamin;
            $data_peserta->tanggal_lahir = $request->tanggal_lahir;
            $data_peserta->pekerjaan = $request->pekerjaan;
            $data_peserta->foto = $nama_file;
            $data_peserta->update();
            //Ketika Kolom name tabel nama_pelatihan diedit maka kolom user juga ikut berubah
            $cari_user_id = DataPeserta::where('id', $id)->pluck('user_id');
            $user = User::where('id', $cari_user_id);
            $user->update([
                'name' => $request->nama_peserta,
            ]);
        }
        else {
            $data_peserta->kode_peserta = $request->kode_peserta;
            $data_peserta->nama_peserta = $request->nama_peserta;
            $data_peserta->id_jenis_kelamin = $request->id_jenis_kelamin;
            $data_peserta->tanggal_lahir = $request->tanggal_lahir;
            $data_peserta->pekerjaan = $request->pekerjaan;
            $data_peserta->update();
            //Ketika kolom nae pada tabel name_peserta diedit
            //maka kolom user juga ikut berubah
            $cari_user_id = DataPeserta::where('id', $id)->pluck('user_id');
            $user = User::where('id', $cari_user_id);
            $user->update([
                'name' => $request->nama_peserta,
            ]);
        }
        
        if($data_peserta->telepon){
            if($request->filled('nomor_telepon')){
                $telepon = $data_peserta->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $data_peserta->telepon()->save($telepon);
            }
            else{
                $data_peserta->telepon()->delete();
            }
        }

        else{
            if($request->filled('nomor_telepon')){
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->nomor_telepon;
                $data_peserta->telepon()->save($telepon);
            }
        }

        Session::flash('flash_message', 'Data Peserta Berhasil diupdate');

        return redirect('data_peserta');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_peserta = DataPeserta::where('nama_peserta', 'like', '%'.$cari.'%')->paginate($batas);
        $no = $batas * ($data_peserta->currentPage() - 1);
        return view('data_peserta.search', compact('data_peserta', 'no', 'cari'));
    }

    public function destroy($id){
        //menghapus data user apabila data peminjma dihapus
        $cari_user_id = DataPeserta::where('id', $id)->pluck('user_id');
        $user = User::where('id', $cari_user_id);
        $user->delete();
        //menghapus data pada tabel data_peserta
        $data_peserta = DataPeserta::find($id);
        $data_peserta->delete();

        Session::flash('flash_message', 'Data peserta Berhasil dihapus');
        Session::flash('penting', true);

        return redirect('data_peserta');
    }
}
