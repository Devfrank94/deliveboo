@extends('layouts.admin')

@section('content')
  <div class="container mt-5">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>

    <div class="row justify-content-center">
      <div class="col">
        <div class="card mb-4">
          <div class="card-header">Ciao {{ Auth::user()->name }}</div>

          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <h4 class="mb-3">Benvenuto nella tua Dashboard </h4>


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
