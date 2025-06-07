<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\GuruKelas;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insert Guru
        $guru1 = Guru::create([
            'id' => 1,
            'nip' => '22334',
            'nama' => 'DANI',
            'email' => 'dani@gmail.com',
            'no_hp' => '086765221',
            'jenis_kelamin' => 'L',
            'alamat' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $guru2 = Guru::create([
            'id' => 2,
            'nip' => '22445',
            'nama' => 'sanger',
            'email' => 'sanger@gmail.com',
            'no_hp' => '0897677541',
            'jenis_kelamin' => 'L',
            'alamat' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Insert Kelas
        $kelas1 = Kelas::create([
            'id' => 1,
            'kode_kelas' => '7A2425',
            'nama_kelas' => '7A',
            'tahun_ajaran' => '2024/2025',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $kelas2 = Kelas::create([
            'id' => 2,
            'kode_kelas' => '7B2425',
            'nama_kelas' => '7B',
            'tahun_ajaran' => '2024/2025',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $kelas3 = Kelas::create([
            'id' => 3,
            'kode_kelas' => '7C2425',
            'nama_kelas' => '7C',
            'tahun_ajaran' => '2024/2025',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Insert Siswa
        Siswa::create([
            'id' => 1,
            'nis' => '66578',
            'nama' => 'rudi',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '2012-03-11',
            'alamat' => 'undaan',
            'kelas_id' => $kelas1->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Siswa::create([
            'id' => 2,
            'nis' => '44546',
            'nama' => 'rina',
            'jenis_kelamin' => 'P',
            'tanggal_lahir' => '2013-02-01',
            'alamat' => 'sambung',
            'kelas_id' => $kelas2->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Siswa::create([
            'id' => 3,
            'nis' => '33455',
            'nama' => 'dwei',
            'jenis_kelamin' => 'P',
            'tanggal_lahir' => '2012-02-12',
            'alamat' => 'medini',
            'kelas_id' => $kelas3->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Insert Guru-Kelas
        GuruKelas::create(['id' => 1, 'guru_id' => $guru1->id, 'kelas_id' => $kelas1->id]);
        GuruKelas::create(['id' => 2, 'guru_id' => $guru1->id, 'kelas_id' => $kelas2->id]);
        GuruKelas::create(['id' => 3, 'guru_id' => $guru1->id, 'kelas_id' => $kelas3->id]);
        GuruKelas::create(['id' => 4, 'guru_id' => $guru2->id, 'kelas_id' => $kelas2->id]);

        // User
        User::create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
