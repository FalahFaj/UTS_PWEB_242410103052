<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class PengelolaanController extends Controller
{
    public function index()
    {
        $daftarMahasiswa = Mahasiswa::dataMahasiswaList();

        return view('pengelola', ['daftarMahasiswa' => $daftarMahasiswa]);
    }

    public function store(Request $request)
    {
        $cek = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
        ]);

        if ($cek) {
            Mahasiswa::tambahMahasiswa($cek);
            return redirect()->route('pengelolaan.index')->with('success', 'Data berhasil disimpan.');
        }

        return redirect()->back()->with('error', 'Data gagal disimpan.');
    }

    public function create()
    {
        return view('tambah_mahasiswa');
    }

    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::cariMahasiswa($id);
        if ($mahasiswa) {
            return view('update_mahasiswa', ['mahasiswa' => $mahasiswa]);
        }
        return redirect()->route('pengelolaan.index')->with('error', 'Mahasiswa tidak ditemukan.');
    }
    public function update(Request $request, string $id)
    {
        $cek = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
        ]);

        if ($cek) {
            $updated = Mahasiswa::updateMahasiswa($id, $cek);
            if ($updated) {
                return redirect()->route('pengelolaan.index')->with('success', 'Data berhasil diupdate.');
            }else {
                return redirect()->back()->with('error', 'Gagal mengubah data');
            }
        }

        return redirect()->back()->with('error', 'Data gagal diupdate.');
    }

    public function destroy(string $id)
    {
        $hapus = Mahasiswa::hapusMahasiswa($id);
        if ($hapus) {
            return redirect()->route('pengelolaan.index')->with('success', 'Data berhasil dihapus.');
        }
        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }
}
