<div>
    <h3>Tambah Kelas</h3>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form wire:submit="submit">
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" wire:model="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas">
            @error('nama_kelas') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="kode_kelas" class="form-label">Kode Kelas</label>
            <input type="text" wire:model="kode_kelas" class="form-control @error('kode_kelas') is-invalid @enderror" id="kode_kelas">
            @error('kode_kelas') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" wire:model="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran">
            @error('tahun_ajaran') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary" wire:navigate>Kembali</a>
    </form>
</div>
