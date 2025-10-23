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
        return collect(session(self::$sessionKey));
    }

    public static function cariMahasiswa($id)
    {
        return self::dataMahasiswaList()->firstWhere('id', (int) $id);
    }

    public static function dataMahasiswaDetail($id)
    {
        return self::cariMahasiswa($id);
    }

    public static function tambahMahasiswa(array $dataBaru): int
    {
        $currentData = self::dataMahasiswaList();

        $lastId = $currentData->max('id') ?? 0;
        $dataBaru['id'] = $lastId + 1;

        $currentData->push($dataBaru);
        session([self::$sessionKey => $currentData->values()->all()]);

        return $dataBaru['id'];
    }

    public static function updateMahasiswa(string $id, array $dataUpdate): bool
    {
        $currentData = self::dataMahasiswaList();
        $index = $currentData->search(fn ($mhs) => $mhs['id'] == (int) $id);

        if ($index !== false) {
            $existingMahasiswa = $currentData->get($index);
            $updatedMahasiswa = array_merge($existingMahasiswa, $dataUpdate);
            $currentData->put($index, $updatedMahasiswa);
            session([self::$sessionKey => $currentData->values()->all()]);
            return true;
        }
        return false;
    }

    public static function hapusMahasiswa(string $id): bool
    {
        $currentData = self::dataMahasiswaList();
        $filteredData = $currentData->filter(fn ($mhs) => $mhs['id'] != (int) $id);

        if ($filteredData->count() < $currentData->count()) {
            session([self::$sessionKey => $filteredData->values()->all()]);
            return true;
        }
        return false;
    }
}
