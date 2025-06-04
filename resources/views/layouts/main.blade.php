<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary my-3">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">Sistem Sekolah</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav me-auto">
                        <a class="nav-link {{ request()->routeIs('kelas.*') ? 'active text-white' : 'text-light' }}"
                            href="{{ route('kelas.index') }}" wire:navigate>
                            Kelas
                        </a>
                        <a class="nav-link {{ request()->routeIs('guru.*') ? 'active text-white' : 'text-light' }}"
                            href="{{ route('guru.index') }}" wire:navigate>
                            Guru
                        </a>
                        <a class="nav-link {{ request()->routeIs('siswa.*') ? 'active text-white' : 'text-light' }}"
                            href="{{ route('siswa.index') }}" wire:navigate>
                            Siswa
                        </a>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>


        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    @livewireScripts
</body>

</html>
