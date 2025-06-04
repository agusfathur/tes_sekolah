<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use App\Models\Kelas;
use Livewire\Component;

class GuruUpdate extends Component

{
    public $guruId;
    public $nip;
    public $nama;
    public $email;
    public $no_hp;
    public $kelasSelected = [];
    public $allKelas = [];

    protected function rules()
    {
        return [
            'nip' => 'required|string|max:30|unique:guru,nip,' . $this->guruId,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:guru,email,' . $this->guruId,
            'no_hp' => 'nullable|string|max:20',
            'kelasSelected' => 'array',
            'kelasSelected.*' => 'exists:kelas,id',
        ];
    }

    public function mount($id)
    {
        $guru = Guru::findOrFail($id);

        $this->guruId = $guru->id;
        $this->nip = $guru->nip;
        $this->nama = $guru->nama;
        $this->email = $guru->email;
        $this->no_hp = $guru->no_hp;
        $this->kelasSelected = $guru->kelas()->pluck('kelas.id')->toArray();

        $this->allKelas = Kelas::all();
    }

    public function submit()
    {
        $this->validate();

        $guru = Guru::findOrFail($this->guruId);
        $guru->update([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
        ]);

        // sync relasi kelas
        $guru->kelas()->sync($this->kelasSelected);

        session()->flash('success', 'Guru berhasil diperbarui.');
       
        $this->redirect(route('guru.index', [], true), true);
    }

    public function render()
    {
        return view('livewire.guru.guru-update');
    }
}

