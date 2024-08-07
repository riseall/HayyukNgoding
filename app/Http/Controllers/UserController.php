<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\JenisKelamin;
use App\Models\DataPeserta;

class UserController extends Controller
{
    protected function index(){
        $batas = 5;
        $jumlah_user = User::count();
        $user_list = User::orderBy('id', 'asc')->simplePaginate($batas);
        $no = 0;
        return view('user.index', compact('user_list', 'no', 'jumlah_user'));
    }

    protected function create(){
        return view('user/create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

        if($user->level == 'peserta'){
            $user_id = User::max('id');
            $name = $request->name;
            $list_jenis_kelamin = JenisKelamin::pluck('nama_jenis_kelamin', 'id_jenis_kelamin');
            return view('data_peserta/create', compact('name', 'user_id', 'list_jenis_kelamin'));
        }
        else{
            return redirect('user');
        }
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        //($user);die();
        $pass_lama = $user->password;
        $user->name = $request->name;
        $user->email = $request->email;
        $pass_baru = $request->password;
        if($pass_lama == $pass_baru){}
        else{
            $user->password = Hash::make($request->password);
        }
        $user->level = $request->level;
        $user->update();

        //ketika kolom name pada tabel user di edit
        //maka kolom nama_peserta juga ikut berubah
        $data_peserta = DataPeserta::where('user_id', $id);
        $data_peserta->update([
            'nama_peserta' => $request->name,
        ]);
        return redirect('user');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        //Ketika user dihapus maka, data_peserta juga terhapus
        $data_peserta = DataPeserta::where('user_id', $id);
        $data_peserta->delete();

        return redirect('user');
    }
}
