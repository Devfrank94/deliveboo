@extends('layouts.admin')

@section('content')

<div class="container my-4">

  <h2 class="mb-5"> Ordine n. {{$order->id}}
    <a href="{{route('admin.orders.edit', $order)}}" class="btn btn-warning mx-3">
      <i class="fa-regular fa-pen-to-square" title="Modifica"></i>
    </a>
  </h2>


  {{-- summary order --}}
  <div class="card" style="max-width: 30rem;">
    <div class="card-body">
      <h3 class="card-title strong my-3"> {{$order->surname_user}} {{$order->name_user}} </h3>

      <div class="my-5">
        <h5>PIATTI SCELTI:</h5>
        <div>-</div>
        <div> Totale Ordine: {{$order->total_price}} &euro; </div>
        <div> Tipologia di Pagamento: {{$order->type_payment}}</div>
      </div>

      <div class="my-5">
        <h5>DATI CLIENTE:</h5>
        <div> N. telefono: {{$order->phone_number_user}} </div>
        <div> Email: {{$order->email_user}} </div>
        <div> Indirizzo: {{$order->address_user}} </div>
      </div>
    </div>
  </div>

  <a href="{{route('admin.orders.index')}}" class="btn btn-dark my-4" title="Indietro"><i class="fa-solid fa-arrow-rotate-left"></i></a>

</div>


@endsection
