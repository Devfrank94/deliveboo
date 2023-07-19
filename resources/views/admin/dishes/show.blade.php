@extends('layouts.admin')


@section('content')
<main class="pt-3">
    <div class="container my-4">
        <h2 class="mb-5">Scheda Piatto | {{$dish->name}}
          <a href="{{route('admin.dishes.edit', $dish)}}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square" title="Modifica" style="color: #ffffff;"></i></a>

          @include('admin.partials.form-delete')

        </h2>

        <div class="card mb-3" style="max-width: 70rem;">
            <div class="row g-0">
              <div class="col-md-6">
                <img src="{{ asset('storage/' . $dish->image_path) }}" onerror="this.src='/img/no_image.jpg'" class="img-fluid rounded-start ratio ratio-1x1 h-100" alt="{{ $dish->image_original_name }}">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title"><div class="fw-bold">Nome Piatto:</div><span class="badge rounded-pill text-bg-primary">{{$dish->name}}</span></h5>
                  <p class="card-text"><div class="fw-bold">Descrizione:</div>{!!$dish->description!!}</p>
                  <p class="card-text"><div class="fw-bold">Ingredienti:</div>{!!$dish->ingredients!!}</p>
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
                            <div class="fw-bold">Stato scheda prodotto:</div>
                            @if($dish->visible == 1)
                            <span class="badge rounded-pill text-bg-success">Attivato</span>
                            @else
                            <span class="badge rounded-pill text-bg-danger">Disattivato</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>
@endsection
