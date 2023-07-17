@extends('layouts.admin')

@section('content')
  <div class="container mt-5 ">
    <h4 class="fs-4 text-secondary my-4">
        Il mio Ristorante
    </h4>

    <h2 class="text-center">
        {{$restaurant->name}}
        @if ($restaurant->name == 1)
            <i class="fa-solid fa-circle" style="color: #00ff00;"></i>
        @else
            <i class="fa-solid fa-circle" style="color: #00ff00;"></i>
        @endif
    </h2>

    <div class="image-container text-center py-5">
        @if ($restaurant->image_path == null)
            <h6>Aggiungi qui la tua immagine</h6>
            <a href="" class="btn btn-dark"><i class="fa-solid fa-image fs-3"></i></a>
        @else
            <img src="{{$restaurant->image_path}}" alt="{{$restaurant->image_original_name}}">
        @endif

    </div>

    <div class="container d-flex justify-content-around">
        <div class="left-container">
            <h5>Indirizzo</h5>
            <p>{{$restaurant->address}}</p>
        </div>
        <div class="right-container">
            <h5>Partita IVA</h5>
            <p>{{$restaurant->p_iva}}</p>
        </div>
    </div>

    <div class="action-container pt-4">
        <h3>Azioni</h3>
        <a href="" class="btn btn-warning"><i class="fa-solid fa-pencil fs-3"></i></a>
    </div>

  </div>
@endsection
