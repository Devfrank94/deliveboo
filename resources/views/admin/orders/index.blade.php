@extends('layouts.admin')

@section('content')


<div class="container-fluid my-4 ">

  <div class="d-flex justify-content-center">

    <h2 class="mb-4">Ordini Ricevuti</h2>

    @if (session('deleted'))
      <div class="alert alert-warning text-center">{{ session('deleted') }}</div>
    @endif

  </div>


  {{-- TABLE --}}
  <table class="table table-striped table-hover table-bordered">

    {{-- thead --}}
    <thead class="rounded-top-1">
      <tr>
        <th scope="col" class="text-center">Id</th>
        <th scope="col" class="text-center">Cliente</th>
        <th scope="col" class="text-center">Telefono</th>
        <th scope="col" class="text-center">Email</th>
        <th scope="col" class="text-center">Indirizzo di Consegna</th>
        <th scope="col" class="text-center">Totale</th>
        <th scope="col" class="text-center">Pagamento</th>
        <th scope="col" class="text-center">Azioni</th>
      </tr>
    </thead>

    {{-- tbody --}}
    <tbody>
      @foreach ($orders as $order)
      <tr>
        <td class="text-center">{{ $order->id }}</td>
        <td class="text-center">{{$order->surname_user}} {{ $order->name_user }}</td>
        <td class="text-center">{{$order->phone_number_user}}</td>
        <td class="text-center">{{$order->email_user}}</td>
        <td class="text-center">{{$order->address_user}}</td>
        <td class="text-center">{{$order->total_price}} &euro;</td>
        <td class="text-center">{{$order->type_payment}}</td>
        <td  class="text-center">

            {{-- Show --}}
            <a href="{{route('admin.orders.show', $order)}}" class="btn btn-success" title="Visualizza">
              <i class="fa-solid fa-eye"></i>
            </a>


            {{-- Edit --}}
            <a href="{{route('admin.orders.edit', $order)}}" class="btn btn-warning" title="Modifica">
              <i class="fa-solid fa-pencil"></i>
            </a>


            {{-- Delete --}}


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" title="Elimina" data-bs-toggle="modal" data-bs-target="{{'#' . $order->id}}">
              <i class="fa-solid fa-trash-can"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger fw-bold" id="exampleModalLabel"> Attenzione </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Sei sicuro di voler eliminare l'ordine numero <strong>{{ $order->id }}</strong> ?
                  </div>

                  {{-- Form Delete --}}
                  <form
                    action="{{route('admin.orders.destroy', $order)}}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('confermi l\'eliminazione di {{$order->name}} ?')">
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
        @endforeach
    </tbody>

  </table>


</div>



</div>

@endsection
