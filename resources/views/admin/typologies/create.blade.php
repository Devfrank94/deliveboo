@extends('layouts.admin')

@section('content')

<div class="container">

  {{-- Errors --}}
  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  {{-- Form Create --}}
  <h2> Crea una nuova tipologia </h2>

  <form action="{{route('admin.typologies.store')}}" method="POST">
    @csrf

    <div class="my-5 mb-3">

      <label for="title" class="form-label fw-bold">Nome Tipologia</label>

      <input
      type="name"
      class="form-control @error('name') is-invalid @enderror"
      id="name"
      name="name"
      value="{{old('name')}}"
      aria-describedby="name"
      placeholder="Inserisci il nome della Tipologia"
      >

      @error('name')
      <p class="text-danger">{{$message}}</p>
      @enderror


      <button type="submit" class="my-3 btn btn-primary">Invia</button>

    </div>

  </form>




</div>

@endsection
