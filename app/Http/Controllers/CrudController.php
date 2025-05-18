<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CrudController extends Controller
{
    public function tambah()
    {
        return view('tambah');
    }

    public function prosesTambah(Request $request)
    {
        $rule_validasi = [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];

        $pesan_validasi = [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'e-Mail harus diisi',
            'email.email' => 'Format e-Mail tidak sesuai',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 5 karakter'
        ];

        $request->validate($rule_validasi, $pesan_validasi);

        $data_to_save = new User();
        $data_to_save->name = $request->nama;
        $data_to_save->email = $request->email;
        $data_to_save->password = $request->password;

        $data_to_save->save();

        return back()->with('Status', 'Data telah disimpan');
    }

    public function Baca()
    {
        $data_users = User::all();

        return view('baca', compact('data_users'));
    }

    public function Ubah($id)
    {
        $data_user = User::findOrFail($id);

        return view('ubah', compact('data_user'));
    }

    public function ProsesUbah(Request $request, $id)
    {
        $rule_validasi = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => $request->filled('password') == true ? 'required|string|min:5' : 'nullable'
        ];

        $pesan_validasi = [
            'name.required' => 'Name harus diisi',
            'email.required' => 'e-Mail harus diisi',
            'email.email' => 'Format e-Mail tidak sesuai',
            'email.unique' => 'e-Mail sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 5 karakter'
        ];

        $request->validate($rule_validasi, $pesan_validasi);

        $data_to_save = User::findOrFail($id);
        $data_to_save->name = $request->name;
        $data_to_save->email = $request->email;

        if ($request->filled('password')) {
            $data_to_save->password = Hash::make($request->password);
        } else {
            $data_to_save->password = $data_to_save->password;
        }

        $data_to_save->save();

        return back()->with('Status', 'Update telah berhasil');
    }

    public function hapus($id)
    {
        $data_user = User::findOrFail($id);
        $data_user->delete();

        return back()->with('Status', 'Data telah dihapus');
    }
}
