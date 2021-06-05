<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $data = DB::table('siswa')
            ->distinct('mengajar')
            ->join('kelas', 'kelas.id_siswa', '=', 'siswa.id')
            ->join('guru', 'guru.id', '=', 'kelas.id_guru')
            ->select('siswa.id', 'siswa.nama', 'guru.nama AS guru', 'alamat', 'guru.mengajar')
            ->get();
        return view('siswa0199', ['data' => $data]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $data = DB::table('siswa')
            ->distinct('mengajar')
            ->where('mengajar', 'like', "%" . $search . "%")
            ->join('kelas', 'kelas.id_siswa', '=', 'siswa.id')
            ->join('guru', 'guru.id', '=', 'kelas.id_guru')
            ->select('siswa.id', 'siswa.nama', 'guru.nama AS guru', 'alamat', 'guru.mengajar')
            ->get();

        return view('siswa0199', ['data' => $data]);
    }

    public function tambah()
    {
        $data = DB::table('guru')
            ->select('id', 'nama', 'mengajar')
            ->get();

        return view('tambah0199', ['data' => $data]);
    }

    public function hapus($id)
    {
        DB::table('kelas')->where('id_siswa', $id)->delete();
        DB::table('siswa')->where('id', $id)->delete();
        return redirect('/');
    }

    public function store(Request $request)
    {
        DB::table('siswa')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
        $id_siswa = DB::getPdo()->lastInsertId();

        $id_guru = DB::table('guru')
            ->where('mengajar', 'like', "%" . $request->mengajar . "%")
            ->select('id')
            ->get();
        // dd($id_guru[0]->id);
        // $id_guru = json_decode(json_encode($id_guru), true);

        DB::table('kelas')->insert([
            'id_guru' => $id_guru[0]->id,
            'id_siswa' => $id_siswa,
        ]);

        return redirect('/');
    }
}
