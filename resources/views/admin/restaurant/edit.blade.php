@extends('layouts.admin')

@section('content')
  <div class="container mt-5 ms-4">
    <h4 class="fs-4 text-secondary my-4">
      Modifica il mio Ristorante
    </h4>


    <form onsubmit="return validateCheckbox()" action="{{route('admin.restaurant.update', $restaurant)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name Restaurants') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $restaurant->name) }}" required autocomplete="name" autofocus>

            @error('name')
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
        <img class="mt-3 rounded-2" src="{{ asset('storage/' . $restaurant->image_path)}}" onerror="this.src='/img/no_image.jpg'" id="img-show" alt="" width="200">
        <div>

          <label for="noImage" class="icon-button">
            <i class="fas fa-eraser"></i>
            <input type="radio" id="noImage" name="noImage" onchange="removeImage()">
          </label>
          <label for="">Rimuovi immagine</label>
      </div>
      </div>

      <div class="mt-4">
        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address Restaurants') }}</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $restaurant->address) }}" required autocomplete="address" autofocus>

            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="mt-4">
        <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('P. Iva Restaurants') }}</label>

        <div class="col-md-6">
            <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva', $restaurant->p_iva) }}" required autocomplete="p_iva" autofocus>

            @error('p_iva')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="mt-5">
      <div class="form-check form-switch mb-3">
        <label for="visible" class="visible">Vuoi attivare il tuo Ristorante?</label>
        <input
          class="form-check-input"
          type="checkbox"
          role="switch"
          name="visible"
          id="visible"
          value="{{ old('visible', $restaurant?->visible)}}" @if($restaurant?->visible)
          checked
        @endif>
      </div>
    </div>

    <div class="mb-3">
      <label class="col-md-4 col-form-label text-md-right">Typologies</label>
      <div class="btn-group d-flex flex-wrap w-50" role="group" aria-label="Basic checkbox toggle button group">
          @foreach ($typologies as $typology)
              <input
                  type="checkbox"
                  class="btn-check form-control @error('typologies') is-invalid @enderror"
                  id="typology{{$loop->iteration}}"
                  value="{{$typology->id}}"
                  name="typologies[]"
                  autocomplete="off"
                  @if (!$errors->any() && $restaurant->typologies->contains($typology))
                    checked
                  @elseif ($errors->any() && in_array($typology->id, old('typologies', [])))
                      checked
                  @endif
                >
                <label class="btn btn-outline-secondary m-2" for="typology{{$loop->iteration}}">{{ $typology->name }}</label>
          @endforeach
      </div>
      @error('typologies')
        <div>
          <span class="d-block text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-success mt-3 me-3">Salva</button>
    <a href="{{route('admin.restaurant.index')}}" class="btn btn-dark mt-3">Indietro</a>
    </form>
  </div>


  <script language="javascript" type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
    } );

    function showImg(event){
        const tagImg = document.getElementById('img-show');
        tagImg.src = URL.createObjectURL(event.target.files[0]);
    }

    function removeImage(){
          const imageInput = document.getElementById('image');
          imageInput.value = '';
          const tagImage = document.getElementById('img-show');
          tagImage.src = '';
      }

    //function validateCheckbox(){
    //  var form_data = new FormData(document.querySelector("form"));
    //  if(form_data.has("typologies[]")){
    //    return true;
    //  }
    //  else{
    //    console.log(form_data.has("typologies[]"));
    //    alert("Devi scegliere almeno una tipologia!")
    //    return false;
    //  }
    //}
  </script>
@endsection
