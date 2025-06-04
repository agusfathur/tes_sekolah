<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class KelasList extends Component
{
    public $kelas = [];

    public function mount()
    {
        $this->loadKelas();
    }

    public function loadKelas()
    {
        $this->kelas = Kelas::all();
    }

    public function delete($id)
    {
        $kelas = Kelas::find($id);

        if ($kelas) {
            $kelas->delete();
            session()->flash('success', 'Kelas berhasil dihapus.');
        } else {
            session()->flash('error', 'Kelas tidak ditemukan.');
        }

        // Refresh daftar kelas setelah hapus
        $this->loadKelas();
    }

    public function render()
    {
        return view('livewire.kelas.kelas-list');
    }
}