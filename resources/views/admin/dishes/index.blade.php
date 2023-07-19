@extends('layouts.admin')

@section('content')
<main>
<div class="container-fluid my-4">
    <h1 class="mb-3 ms-3">Elenco Piatti</h1>

    <a href="{{route('admin.dishes.create')}}" class="btn btn-success mb-4 ms-3"><i class="fa-solid fa-utensils"></i> Crea Nuovo Piatto</a>
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif

        <div class="container-fluid d-flex flex-wrap row-cols-auto gap-3">
                @foreach ($dishes as $dish)
                    <div class="card" style="width: 20rem;">
                        <img src="{{ asset('storage/' . $dish->image_path) }}" onerror="this.src='/img/no_image.jpg'" alt="{{ $dish->image_original_name }}" class="card-img-top h-25">
                        <div class="card-body h-25">
                        <h5 class="card-title"><div class="fw-bold">Nome Piatto:</div><span class="badge rounded-pill text-bg-primary">{{$dish->name}}</span>
                        </h5>
                        <p class="card-text"><div class="fw-bold">Descrizione:</div>{!!$dish->description!!}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"><div class="fw-bold">Prezzo:</div>{{$dish->price}} €</li>
                        {{-- <li class="list-group-item">
                            <div class="fw-bold">Voto:</div>
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $dish->vote)
                                <i class="fa-solid fa-burger me-1" style="color: #F9C80E;"></i>
                                @else
                                <i class="fa-solid fa-burger me-1" style="color: #c0c0c0;"></i></span>
                                @endif
                            @endfor
                        </li> --}}
                        <li class="list-group-item">
                            <div class="fw-bold">Stato di attivazione:</div>
                            @if($dish->visible == 1)
                            <span class="badge rounded-pill text-bg-success">Attivato</span>
                            @else
                            <span class="badge rounded-pill text-bg-danger">Disattivato</span>
                            @endif
                        </li>
                        </ul>
                        <li class="list-group-item text-center my-3">
                            <a href="{{route('admin.dishes.show', $dish)}}" class="btn btn-secondary"><i class="fa-regular fa-eye" title="Vedi" style="color: #ffffff;"></i></a>
                            <a href="{{route('admin.dishes.edit', $dish)}}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square" title="Modifica" style="color: #ffffff;"></i></a>
                            @include('admin.partials.form-delete')
                        </li>
                    </div>
                @endforeach
        </div>


  </div>
  {{-- Pagination --}}
  <div class="ms-4 my-3">
    {{ $dishes->links() }}
  </div>
</div>
</main>

@endsection
