@extends('layouts.main')

@section('content')
   @livewire('guru.guru-update', ['id' => $id])
@endsection
