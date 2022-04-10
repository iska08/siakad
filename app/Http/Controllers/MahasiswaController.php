<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller {
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $mahasiswa = Mahasiswa::with('kelas')->get();
        $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(3);
        return view('mahasiswa.index', ['mahasiswa' =>  $mahasiswa, 'paginate' => $paginate]);
    }
    public function create() {
        return view('mahasiswa.create');
    }
    public function store(Request $request) {
        // melakukan validasi data
        $request->validate([
            'Nim' => 'required|digits_between:8,12',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Lahir' => 'required',
        ]);
        // fungsi eloquent untuk menambah data
        Mahasiswa::create($request->all());
        // jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $mahasiswa = Mahasiswa::where('nama', 'like', "%" . $keyword . "%")->paginate(3);
        return view('mahasiswa.index', compact('mahasiswa'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function show($Nim) {
        // menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->first();
        return view('mahasiswa.detail', compact('Mahasiswa'));
    }
    public function edit($Nim) {
        // menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->first();
        return view('mahasiswa.edit', compact('Mahasiswa'));
    }
    public function update(Request $request, $Nim) {
        // melakukan validasi data
        $request->validate([
            'Nim' => 'required|digits_between:10',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Lahir' => 'required',
        ]);
        // fungsi eloquent untuk mengupdate data inputan kita
        $Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->update($request->all());
        // jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy( $Nim) {
        // fungsi eloquent untuk menghapus data
        $Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Dihapus');
    }
};