@extends('layouts.admin')

@section('content')
  <div class="container mt-5 ">
    <form action="{{route('admin.restaurant.update', $restaurant)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="">
        <label for="name_restaurant" class="col-md-4 col-form-label text-md-right">{{ __('Name Restaurants') }}</label>

        <div class="col-md-6">
            <input id="name_restaurant" type="text" class="form-control @error('name_restaurant') is-invalid @enderror" name="name_restaurant" value="{{ old('name_restaurant') }}" required autocomplete="name_restaurant" autofocus>

            @error('name_restaurant')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
      </div>

      <div class="col-md-6 mt-4">
        <label for="image" class="form-label">Select an Image</label>
        <input
            class="form-control"
            onchange="showImg(event)"
            type="file"
            id="image"
            name="image"
        >
        <img class="py-3" src="" id="img-show" alt="" width="200">
      </div>


    </form>
  </div>


  <script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
    } );

    function showImg(event){
        const tagImg = document.getElementById('img-show');
        tagImg.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>
@endsection
