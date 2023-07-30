@extends('layouts.admin')

@section('content')

<div class="container my-4">

  <h1 class="mb-5 text-center"> Ordini di {{$order->surname_user}} {{$order->name_user}}
    <a href="{{route('admin.orders.edit', $order)}}" class="btn btn-warning mx-3">
      <i class="fa-regular fa-pen-to-square" title="Modifica"></i>
    </a>


  </h1>

          @php
            $date = date_create($order->date);
          @endphp

  {{-- summary order --}}
  <div class="card" >
    <div class="card-body">
      <h2 class="card-title strong my-3 text-center"> Ordine n. {{$order->id}} </h2>
      <h3 class="text-center mb-5">DATA: {{date_format($date, 'd/m/Y')}} </h3>

          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome Piatto</th>
                <th scope="col">Foto</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Quantità</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order->dishes as $dish)
              <tr>
                <td>{{$dish->id}}</td>
                <td>{{$dish->name}}</td>
                <td>
                  <img class="mt-3 rounded-2" style="width: 200px" id="prev-image" src="{{ asset('storage/' . $dish->image_path) }}" onerror="this.src='/img/no_image.jpg'" alt="">
                </td>
                <td>
                  {{$order->total_price}}
                </td>

                <td>{{$order->dish_quantity}}</td>
              </tr>
              <tr>

              @endforeach
            </tbody>
          </table>
        </div>


        <div class="d-flex flex-column align-items-end mx-5">
          <h5>Quantità totale piatti: - </h5>
          <h4> Totale Ordine: {{$order->total_price}} &euro; </h4>
        </div>
      </div>

    </div>
  </div>

  <a href="{{route('admin.orders.index')}}" class="btn btn-dark my-4" title="Indietro"><i class="fa-solid fa-arrow-rotate-left"></i></a>

</div>


@endsection
