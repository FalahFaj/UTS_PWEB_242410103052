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
        return session(self::$sessionKey);
    }

    public static function cariMahasiswa($id)
    {
        return self::dataMahasiswaList()->get($id);
    }

    public static function dataMahasiswaDetail($id)
    {
        $daftarMahasiswa = self::dataMahasiswaList();
        return $daftarMahasiswa['data' . $id] ?? null;
    }

    public static function tambahMahasiswa(array $dataBaru): string
    {
        $data = self::dataMahasiswaList()->all();
        $data['data' . $dataBaru['id']] = $dataBaru;
        session([self::$sessionKey => $data]);
        return $dataBaru['id'];
    }

    public static function updateMahasiswa(string $id, array $dataUpdate): bool
    {
        $data = self::dataMahasiswaList()->all();
        if (isset($data['data' . $id])) {
            $data['data' . $id] = array_merge($data['data' . $id], $dataUpdate);
            session([self::$sessionKey => $data]);
            return true;
        }
        return false;
    }

    public static function hapusMahasiswa(string $id): bool
    {
        $data = self::dataMahasiswaList()->all();
        if (isset($data['data' . $id])) {
            unset($data['data' . $id]);
            session([self::$sessionKey => $data]);
            return true;
        }
        return false;
    }
}
