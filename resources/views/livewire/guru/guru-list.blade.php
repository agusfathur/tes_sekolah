<div class="container">
    {{-- ALERT SUCCESS --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Guru</h3>
        <a href="{{ route('guru.create') }}" class="btn btn-primary" wire:navigate>+ Tambah Guru</a>
    </div>

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

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Kelas</th> <!-- kolom kelas -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($guru as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>
                        @if ($item->kelas->count())
                            <ul class="mb-0">
                                @foreach ($item->kelas as $kelas)
                                    <li>{{ $kelas->nama_kelas }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>- Tidak ada kelas -</em>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-sm btn-warning"
                            wire:navigate>Edit</a>
                        <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin hapus guru ini?')">
                            Hapus
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data guru</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
