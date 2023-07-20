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
    <h1> Modifica Ordine </h1>

    <form action="{{route('admin.orders.update', $order)}}" method="POST">
      @method('PUT')

      <div class="my-5 mb-3 form-group">
        @csrf


          {{-- <input
          type="phone-number"
          class="form-control @error('phone_number_user') is-invalid @enderror w-50"
          id="phone_number_user"
          name="phone_number_user"
          value="{{old('phone_number_user')}}"
          aria-describedby="phone_number_user"
          placeholder="Modifica il numero di telefono"
          > --}}

        {{-- @foreach ($orders as $order)
        @foreach ($order->dishes as $dish ) --}}

            {{-- {{$dish->name}} --}}


        {{-- @endforeach
        @endforeach --}}

          @error('name')
          <p class="text-danger">{{$message}}</p>
          @enderror


          <table class="table table-bordered  ">
            <thead>
              <tr>
                <th scope="col">Nome Piatto</th>
                <th scope="col">Ingredienti</th>
                <th scope="col">Azione</th>
              </tr>
            </thead>

            <tbody>

              @foreach ($dishes as $dish)
              <tr>

                <td>{{$dish->name}}</td>

                <td>{{$dish->ingredients}}</td>

                <td>

            {{-- Delete --}}

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" title="Elimina" data-bs-toggle="modal" data-bs-target="{{'#' . $dish->id}}">
              <i class="fa-solid fa-trash-can"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="{{$dish->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger fw-bold" id="exampleModalLabel"> Attenzione </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Sei sicuro di voler eliminare l'ordine numero <strong>{{ $dish->name }}</strong> ?
                  </div>

                  {{-- Form Delete --}}
                  <form
                    action="{{route('admin.dishes.destroy', $dish)}}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('confermi l\'eliminazione di {{$dish->name}} ?')">
                      @csrf
                      @method('DELETE')

                    <div class="modal-footer">

                      <button
                      type="submit"
                      title="elimina"
                      class="btn btn-danger fw-bold">
                      Elimina
                      </button>


                      <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Annulla</button>
                  </form>

                </div>
              </div>
            </div>
                </td>
              </tr>
              <tr>

              @endforeach
            </tbody>
          </table>



      </div>

      <button type="submit" class="btn btn-primary">Invia</button>


    </form>

  </div>

@endsection
