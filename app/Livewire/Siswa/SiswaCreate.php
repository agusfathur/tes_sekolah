<?php

namespace App\Livewire\Siswa;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class SiswaCreate extends Component
{
    public $nis, $nama, $jenis_kelamin = 'L', $tanggal_lahir, $alamat, $kelas_id;
    public $kelasList = [];

    protected $rules = [
        'nis' => 'required|string|max:255|unique:siswa,nis',
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:L,P',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'nullable|string|max:255',
        'kelas_id' => 'required|exists:kelas,id',
    ];

    public function mount()
    {
        $this->kelasList = Kelas::all();
    }

    public function submit()
    {
        $this->validate();

        Siswa::create([
            'nis' => $this->nis,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'kelas_id' => $this->kelas_id,
        ]);

        session()->flash('success', 'Siswa berhasil ditambahkan.');
         $this->redirect(route('siswa.index', [], true), true);
    }

    public function render()
    {
        return view('livewire.siswa.siswa-create');
    }
}