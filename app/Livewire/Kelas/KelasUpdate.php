<?php

namespace App\Livewire\Kelas;

use Livewire\Component;
use App\Models\Kelas;

class KelasUpdate extends Component
{
    public $kelasId;
    public $nama_kelas, $kode_kelas, $tahun_ajaran;

    protected function rules()
    {
        return [
            'nama_kelas' => 'required|string|max:255',
            'kode_kelas' => 'required|string|max:50|unique:kelas,kode_kelas,' . $this->kelasId,
            'tahun_ajaran' => 'required|string|max:20',
        ];
    }

    public function mount($id)
    {
        $kelas = Kelas::findOrFail($id);
        $this->kelasId = $kelas->id;
        $this->nama_kelas = $kelas->nama_kelas;
        $this->kode_kelas = $kelas->kode_kelas;
        $this->tahun_ajaran = $kelas->tahun_ajaran;
    }

    public function submit()
    {
        $this->validate();

        $kelas = Kelas::findOrFail($this->kelasId);
        $kelas->update([
            'nama_kelas' => $this->nama_kelas,
            'kode_kelas' => $this->kode_kelas,
            'tahun_ajaran' => $this->tahun_ajaran,
        ]);

        session()->flash('success', 'Kelas berhasil diperbarui.');
        $this->redirect(route('kelas.index', [], true), true);
    }

    public function render()
    {
        return view('livewire.kelas.kelas-update');
    }
}
