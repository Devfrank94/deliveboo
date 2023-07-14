@extends('layouts.admin')


@section('content')
<main class="pt-3">
    <div class="container my-4">
        <h2 class="mb-5">Scheda Piatto | {{$dish->name}}
          <a href="{{route('admin.dishes.edit', $dish)}}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square" title="Modifica" style="color: #ffffff;"></i></a>

          @include('admin.partials.form-delete')

        </h2>

        

    </div>
</main>
@endsection
