@extends('layouts.admin')

@section('content')
<main>
<div class="container my-4">
    <h1 class="mb-4">Elenco Piatti</h1>

    <a href="{{route('admin.dishes.create')}}" class="btn btn-success mb-3"><i class="fa-solid fa-utensils"></i> Crea Nuovo Piatto</a>
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif
    @foreach ($dishes as $dish)
    {{-- TODO:caricare anche le immagini in storage  {{ asset('storage/' . $dish->image_path) }} --}}
    <div class="card" style="width: 20rem;">
        <img src="{{ asset($dish->image_path) }}" onerror="this.src='/img/no_image.jpg'" alt="{{ $dish->image_original_name }}" class="card-img-top">
        <div class="card-body">
        <h5 class="card-title"><div class="fw-bold">Nome Piatto:</div><span class="badge rounded-pill text-bg-primary">{{$dish->name}}</span>
        </h5>
        <p class="card-text"><div class="fw-bold">Descrizione:</div>{!!$dish->description!!}</p>
        <p class="card-text"><div class="fw-bold">Ingredienti:</div>{{$dish->ingredients}}</p>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item"><div class="fw-bold">Prezzo:</div>{{$dish->price}} €</li>
        <li class="list-group-item">
            <div class="fw-bold">Voto:</div>
            @for($i = 1; $i <= 5; $i++)
                @if($i <= $dish->vote)
                <i class="fa-solid fa-utensils" style="color: #f2ca28;"></i>
                @else
                <i class="fa-regular fa-utensils"></i></span>
                @endif
            @endfor
        </li>
        </ul>
        <div class="card-body">
            <a href="{{route('admin.dishes.show', $dish)}}" class="btn btn-secondary"><i class="fa-regular fa-eye" title="Vedi" style="color: #ffffff;"></i></a>
            {{-- <a href="{{route('admin.dishes.edit', $dish)}}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square" title="Modifica" style="color: #ffffff;"></i></a> --}}
            {{-- @include('admin.partials.form-delete') --}}
        </div>
    </div>
    @endforeach

  </div>
  {{-- Pagination --}}
  {{-- <div>
    {{ $projects->links() }}
  </div> --}}
</div>
</main>

@endsection
