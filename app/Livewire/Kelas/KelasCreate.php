<?php

namespace App\Livewire\Kelas;

use Livewire\Component;
use App\Models\Kelas;

class KelasCreate extends Component
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

        $this->redirect(route('kelas.index', [], true), true);
    }

    public function render()
    {
        return view('livewire.kelas.kelas-create');
    }
}
