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
        <h3>Daftar Kelas</h3>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary" wire:navigate>+ Tambah Kelas</a>
    </div>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Kode Kelas</th>
                <th>Tahun Ajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelas as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_kelas }}</td>
                    <td>{{ $item->kode_kelas }}</td>
                    <td>{{ $item->tahun_ajaran }}</td>
                    <td>
                        <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-sm btn-warning" wire:navigate>Edit</a>
                        <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin hapus kelas ini?')">
                            Hapus
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data kelas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
