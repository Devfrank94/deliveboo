@extends('layouts.admin')

@section('content')


<div class="container">

  <h2>Tipologie</h2>

  <div>
    
    {{-- TABLE --}}
    <table class="table">

      {{-- thead --}}
      <thead>
        <tr>
          <th scope="col">Tipologia</th>
          <th scope="col">Ristorante in cui è presente</th>
          <th>Azioni</th>
        </tr>
      </thead>

      {{-- tbody --}}
      <tbody>
        <tr>
          @foreach ($typologies as $typology)
          <td></td>
          <td>{{$typology->name}}</td>
          <td>{{count($typology->restaurants)}}</td>
          @endforeach

          {{-- Create --}}
            <td>
              <a href="{{route('admin.typologies.create')}}" class="btn btn-success" title="Crea Nuovo">

              </a>
            </td>

            {{-- Edit --}}
            <td>
              <a href="{{route('admin.typologies.edit')}}" class="btn btn-warning" title="Modifica">
                <i class="fa-solid fa-pencil"></i>
              </a>
            </td>

            {{-- Delete --}}
            <td>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-trash-can"></i>
              </button>
            </td>

        </tr>
      </tbody>

    </table>


  </div>

</div>

@endsection


