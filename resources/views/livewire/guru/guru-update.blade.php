<div class="container">
    <h3>Edit Guru</h3>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form wire:submit="submit">
        <div class="mb-3">
            <label for="nip" class="form-label">NIP Guru</label>
            <input type="text" wire:model="nip" id="nip"
                class="form-control @error('nip') is-invalid @enderror">
            @error('nip')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Guru</label>
            <input type="text" wire:model="nama" id="nama"
                class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" wire:model="email" id="email"
                class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">NO HP</label>
            <input type="text" wire:model="no_hp" id="no_hp"
                class="form-control @error('no_hp') is-invalid @enderror">
            @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Pilih Kelas</label>
            <div class="@error('kelasSelected') is-invalid @enderror">
                @foreach ($allKelas as $kelas)
                    <div class="form-check">
                        <input wire:model="kelasSelected" class="form-check-input" type="checkbox"
                            value="{{ $kelas->id }}" id="kelas_{{ $kelas->id }}">
                        <label class="form-check-label" for="kelas_{{ $kelas->id }}">
                            {{ $kelas->nama_kelas }} ({{ $kelas->kode_kelas }})
                        </label>
                    </div>
                @endforeach
            </div>
            @error('kelasSelected')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary" wire:navigate>Kembali</a>
    </form>
</div>
