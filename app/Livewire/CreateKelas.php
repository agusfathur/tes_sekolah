<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class CreateKelas extends Component
{
    public $nama_kelas, $kode_kelas, $tahun_ajaran;

    protected $rules = [
        'nama_kelas' => 'required|string|max:255',
        'kode_kelas' => 'required|string|max:50|unique:kelas,kode_kelas',
        'tahun_ajaran' => 'required|string|max:20',
    ];

    public function submit()
    {
        $this->validate();

        Kelas::create([
            'nama_kelas' => $this->nama_kelas,
            'kode_kelas' => $this->kode_kelas,
            'tahun_ajaran' => $this->tahun_ajaran,
        ]);

        session()->flash('success', 'Kelas berhasil ditambahkan.');

        return redirect()->route('kelas.index'); // Atur sesuai route index
    }

    public function render()
    {
        return view('livewire.create-kelas');
    }
}
