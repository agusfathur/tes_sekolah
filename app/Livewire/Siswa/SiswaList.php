<?php

namespace App\Livewire\Siswa;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class SiswaList extends Component
{
    public $filterKelas = '';
    public $kelasList = [];
    public $siswas = [];

    public function mount()
    {
        $this->kelasList = Kelas::all();
        $this->loadSiswas();
    }

    public function loadSiswas()
    {
        $this->siswas = Siswa::with('kelas')
            ->when($this->filterKelas, fn($query) => $query->where('kelas_id', $this->filterKelas))
            ->get();
    }

    public function filter()
    {
        // Dipanggil saat tombol Filter diklik
        $this->loadSiswas();
    }

    public function delete($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        $this->loadSiswas();

        session()->flash('success', 'Siswa berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.siswa.siswa-list');
    }
}
