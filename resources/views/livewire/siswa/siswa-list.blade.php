<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Siswa</h3>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary" wire:navigate>+ Tambah Siswa</a>
    </div>

    {{-- Alert sukses --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div style="max-width: 300px; margin-bottom: 10px;">
        <label for="filterKelas" class="form-label">Filter Kelas</label>
        <div class="d-flex">
            <select id="filterKelas" wire:model="filterKelas" class="form-select me-2">
                <option value="">-- Semua Kelas --</option>
                @foreach ($kelasList as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
            <button wire:click="filter" class="btn btn-primary">Filter</button>
        </div>
    </div>



    {{-- Tabel data siswa --}}
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Tgl Lahir</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $index => $siswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->tanggal_lahir ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') : '-' }}
                    </td>
                    <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning"
                            wire:navigate>Edit</a>
                        <button wire:click="delete({{ $siswa->id }})"
                            onclick="return confirm('Yakin hapus siswa ini?')" class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data siswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
