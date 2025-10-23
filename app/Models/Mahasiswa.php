<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public static function dataMahasiswa(){
        return [
            'data1' => ['id' => 1, 'nim' => '242410103052', 'nama' => 'Muhammad Falah', 'jurusan' => 'Informatika'],
            'data2' => ['id' => 2, 'nim' => '242410103006', 'nama' => 'Ikantuktuk', 'jurusan' => 'Informatika'],
            'data3' => ['id' => 3, 'nim' => '242410103007', 'nama' => 'Semut merah', 'jurusan' => 'Teknologi Informasi'],
            'data4' => ['id' => 4, 'nim' => '242410101010', 'nama' => 'Biskuit', 'jurusan' => 'Sistem Informasi'],
            'data5' => ['id' => 5, 'nim' => '242410103005', 'nama' => 'Pulu-pulu', 'jurusan' => 'Informatika']
        ];
    }
    private static $sessionKey = 'data_mahasiswa';

    public static function dataMahasiswaList()
    {
        if (!session()->has(self::$sessionKey)) {
            session([self::$sessionKey => self::dataMahasiswa()]);
        }
        // [PERBAIKAN] Ubah array dari session menjadi Laravel Collection
        return collect(session(self::$sessionKey));
    }

    public static function cariMahasiswa($id)
    {
        // [PERBAIKAN] Gunakan firstWhere untuk mencari data berdasarkan nilai 'id'
        return self::dataMahasiswaList()->firstWhere('id', (int) $id);
    }

    public static function dataMahasiswaDetail($id)
    {
        // [PERBAIKAN] Arahkan ke metode cariMahasiswa yang sudah benar
        return self::cariMahasiswa($id);
    }

    public static function tambahMahasiswa(array $dataBaru): int
    {
        $currentData = self::dataMahasiswaList(); // Ini sudah menjadi Collection

        // [PERBAIKAN] Buat ID baru secara otomatis
        $lastId = $currentData->max('id') ?? 0;
        $dataBaru['id'] = $lastId + 1;

        // Tambahkan data baru ke Collection dan simpan kembali ke session
        $currentData->push($dataBaru);
        session([self::$sessionKey => $currentData->values()->all()]);

        return $dataBaru['id'];
    }

    public static function updateMahasiswa(string $id, array $dataUpdate): bool
    {
        $currentData = self::dataMahasiswaList();
        // [PERBAIKAN] Cari index dari data yang akan diupdate
        $index = $currentData->search(fn ($mhs) => $mhs['id'] == (int) $id);

        if ($index !== false) {
            $existingMahasiswa = $currentData->get($index);
            $updatedMahasiswa = array_merge($existingMahasiswa, $dataUpdate);
            $currentData->put($index, $updatedMahasiswa); // Update data di Collection
            session([self::$sessionKey => $currentData->values()->all()]); // Simpan kembali ke session
            return true;
        }
        return false;
    }

    public static function hapusMahasiswa(string $id): bool
    {
        $currentData = self::dataMahasiswaList();
        // [PERBAIKAN] Filter data untuk menghapus item yang cocok
        $filteredData = $currentData->filter(fn ($mhs) => $mhs['id'] != (int) $id);

        if ($filteredData->count() < $currentData->count()) {
            // Simpan data yang sudah difilter dan reset index array-nya
            session([self::$sessionKey => $filteredData->values()->all()]);
            return true;
        }
        return false;
    }
}
