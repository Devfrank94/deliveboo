@extends('layouts.admin')

@section('content')


<div class="container my-4">

  <div class="d-flex">
    
    <h2 class="mb-4">Tipologie</h2>

    <div>
      <a href="{{route('admin.typologies.create')}}" class="mx-4 btn btn-outline-primary">
        <i class="fa-solid fa-plus"></i>
      </a>
    </div>

  </div>

  <div>

    {{-- TABLE --}}
    <table class="table table-hover w-50 table-bordered">

      {{-- thead --}}
      <thead class="rounded-top-1">
        <tr>
          <th scope="col">Tipologia</th>
          <th scope="col" class="text-center">Ristorante in cui è presente</th>
          <th scope="col" class="text-center">Azioni</th>
        </tr>
      </thead>

      {{-- tbody --}}
      <tbody>
        @foreach ($typologies as $typology)
        <tr>
          <td>{{ $typology->name }}</td>
          <td  class="text-center">{{ count($typology->restaurants) }}</td>



            {{-- Edit --}}
            <td  class="text-center">
              <a href="{{route('admin.typologies.edit', $typology)}}" class="btn btn-warning" title="Modifica">
                <i class="fa-solid fa-pencil"></i>
              </a>


            {{-- Delete --}}


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa-solid fa-trash-can"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger fw-bold" id="exampleModalLabel"> Attenzione </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Sei sicuro di voler eliminare {{ $typology->name }}?
                  </div>

                  {{-- Form Delete --}}
                  <form
                    action="{{route('admin.typologies.destroy', $typology)}}"
                    method="POST">
                      @csrf
                      @method('DELETE')

                    <div class="modal-footer">
                      <button
                      type="submit"
                      class="btn btn-danger fw-bold">
                      Elimina
                      </button>

                      <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Annulla</button>
                  </form>

                </div>
              </div>
            </div>
            </td>

            @endforeach
        </tr>
      </tbody>

    </table>


  </div>

</div>

@endsection


