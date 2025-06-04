<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use App\Models\Kelas;
use Livewire\Component;

class GuruCreate extends Component
{
    public $nip;
    public $nama;
    public $email;
    public $no_hp;
    public $kelasSelected = []; // array kelas yg dipilih

    public $allKelas = [];

    protected $rules = [
        'nip' => 'required|unique:guru,nip',
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:guru,email',
        'no_hp' => 'nullable|string|max:20',
        'kelasSelected' => 'array', 
        'kelasSelected.*' => 'exists:kelas,id',
    ];

    public function mount()
    {
        $this->allKelas = Kelas::all();
    }

    public function submit()
    {
        $this->validate();

        $guru = Guru::create([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
        ]);

        // Sync kelas
        $guru->kelas()->sync($this->kelasSelected);

        session()->flash('success', 'Guru berhasil ditambahkan.');
       
        $this->redirect(route('guru.index', [], true), true);
    }

    public function render()
    {
        return view('livewire.guru.guru-create');
    }
}
