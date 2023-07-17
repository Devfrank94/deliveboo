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

    {{-- Form Edit --}}
    <h1> Modifica Tipologia </h1>

    <form action="{{route('admin.typologies.update', $typology )}}" method="POST">
      @method('PUT')

      <div class="my-5 mb-3">
        @csrf

          <label for="title" class="form-label fw-bold">Nome Tipologia</label>

          <input
          type="name"
          class="form-control @error('name') is-invalid @enderror"
          id="name"
          name="name"
          value="{{old('name')}}"
          aria-describedby="name"
          placeholder="Modifica il nome della Tipologia"
          >

          @error('name')
          <p class="text-danger">{{$message}}</p>
          @enderror


      </div>

      <button type="submit" class="btn btn-primary">Invia</button>


    </form>

  </div>

@endsection
