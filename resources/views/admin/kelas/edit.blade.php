@extends('layouts.main')

@section('content')
   @livewire('kelas.kelas-update', ['id' => $id])
@endsection
