@extends('layouts.main')

@section('content')
   @livewire('siswa.siswa-update', ['id' => $id])
@endsection
