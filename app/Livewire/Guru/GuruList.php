<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use App\Models\Kelas;
use Livewire\Component;

class GuruList extends Component
{
    public $guru = [];
    public $kelasList = [];
    public $filterKelas = '';

    public function mount()
    {
        $this->kelasList = Kelas::all();
        $this->loadGuru();
    }

    public function loadGuru()
    {
        $query = Guru::query()->with('kelas'); // assuming Guru has many-to-many kelas relation

        if ($this->filterKelas) {
            $query->whereHas('kelas', function($q) {
                $q->where('kelas_id', $this->filterKelas);
            });
        }

        $this->guru = $query->get();
    }

    public function filter()
    {
        $this->loadGuru();
    }

    public function delete($id)
    {
        $guru = Guru::find($id);

        if ($guru) {
            $guru->delete();
            session()->flash('success', 'Guru berhasil dihapus.');
        } else {
            session()->flash('error', 'Guru tidak ditemukan.');
        }

        $this->loadGuru();
    }

    public function render()
    {
        return view('livewire.guru.guru-list');
    }
}
