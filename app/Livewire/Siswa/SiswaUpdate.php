<?php

namespace App\Livewire\Siswa;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class SiswaUpdate extends Component
{
    public $siswaId;
    public $nis, $nama, $jenis_kelamin, $tanggal_lahir, $alamat, $kelas_id;
    public $kelasList = [];

    public function mount($id)
    {
        $siswa = Siswa::findOrFail($id);
        $this->siswaId = $siswa->id;
        $this->nis = $siswa->nis;
        $this->nama = $siswa->nama;
        $this->jenis_kelamin = $siswa->jenis_kelamin;
        $this->tanggal_lahir = $siswa->tanggal_lahir;
        $this->alamat = $siswa->alamat;
        $this->kelas_id = $siswa->kelas_id;

        $this->kelasList = Kelas::all();
    }

    public function submit()
    {
        $this->validate([
            'nis' => 'required|string|max:255|unique:siswa,nis,' . $this->siswaId,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $siswa = Siswa::findOrFail($this->siswaId);
        $siswa->update([
            'nis' => $this->nis,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'kelas_id' => $this->kelas_id,
        ]);

        session()->flash('success', 'Data siswa berhasil diperbarui.');
         $this->redirect(route('siswa.index', [], true), true);
    }

    public function render()
    {
        return view('livewire.siswa.siswa-update');
    }
}