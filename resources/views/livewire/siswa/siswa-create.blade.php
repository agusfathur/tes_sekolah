<div class="container">
    <h3>Tambah Siswa</h3>

    <form wire:submit="submit">

        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" wire:model="nis" class="form-control @error('nis') is-invalid @enderror">
            @error('nis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror"
                id="nama">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select wire:model="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror"
                id="jenis_kelamin">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" wire:model="tanggal_lahir"
                class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir">
            @error('tanggal_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea wire:model="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select wire:model="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelasList as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
            @error('kelas_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary" wire:navigate>Kembali</a>
    </form>
</div>
