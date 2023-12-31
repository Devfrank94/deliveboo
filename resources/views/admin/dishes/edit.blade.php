@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h1 class="my-3">Modifica | {{ $dish->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{--------------- NOME PIATTO -----------------}}
            <div class="mb-4">
                <label for="name" class="form-label">Nome (*)</label>
                <input
                  id="name"
                  value="{{ old('name', $dish?->name) }}"
                  class="form-control @error('name') is-invalid @enderror"
                  name="name"
                  placeholder="Inserisci Nome Piatto"
                  type="text"
                >
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{--------------- IMMAGINE PIATTO -----------------}}
            <div class="mb-4">
                <label for="image_path" class="form-label">Immagine Piatto (*)</label>
                <input
                  id="image_path"
                  onchange="showImage(event)"
                  class="form-control"
                  value="{{ old('image_path', $dish?->image_path)}}"
                  name="image_path"
                  type="file"
                >
                <img class="mt-3 rounded-2" style="width: 200px" id="prev-image" src="{{ asset('storage/' . $dish->image_path) }}" onerror="this.src='/img/no_image.jpg'" alt="">
                <div>
                  <label for="noImage" class="icon-button">
                    <i class="fas fa-eraser"></i>
                    <input type="radio" id="noImage" name="noImage" onchange="removeImage()">
                  </label>
                  <label for="">Rimuovi immagine</label>
              </div>
            </div>

            {{--------------- DESCRIZIONE PIATTO -----------------}}
            <div class="mb-4">
                <label for="description" class="form-label @error('description') is-invalid @enderror">Descrizione (*)</label>
                <textarea class="form-control"  name="description" id="description" value="{{ old('description', $dish?->description) }}" cols="30" rows="10" placeholder="Descrivi il piatto">{{ old('description', $dish?->description) }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{--------------- INGREDIENTI PIATTO-----------------}}
            <div class="mb-4">
                <label for="ingredients" class="form-label form-label @error('ingredients') is-invalid @enderror">Ingredienti: (*)</label>
                <textarea class="form-control"  name="ingredients" id="ingredients" value="{{ old('ingredients', $dish?->ingredients) }}" cols="30" rows="10" placeholder="Inserisci ingredienti">{{ old('ingredients', $dish?->ingredients) }}</textarea>
                @error('ingredients')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{--------------- PREZZO PIATTO -----------------}}
            <div class="mb-4">
                <label for="price" class="form-label">Costo in € (*)</label>
                <input
                id="price"
                value="{{ old('price', $dish?->price) }}"
                class="form-control w-25 @error('price') is-invalid @enderror"
                min="1"
                name="price"
                placeholder="Costo del piatto"
                type="number"
                >
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{--------------- VOTO PIATTO -----------------}}
            {{-- <div class="mb-4">
                <label for="vote" class="form-label">Seleziona un voto da 1 a 5 (*)</label>
                <div>
                    <input type="range" class="form-range w-50" value="{{ old('vote', $dish?->vote) }}" min="1" max="5" id="vote" name="vote">
                    @error('vote')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div> --}}

            {{-- STATO DI ATTIVAZIONE DEL PRODOTTO --}}
            <div class="mb-4">
              <div class="form-check form-switch mb-3">
                <label for="visible" class="visible">Vuoi attivare la scheda piatto?</label>
                <input
                  class="form-check-input"
                  type="checkbox"
                  role="switch"
                  name="visible"
                  id="visible"
                  value="{{ old('visible', $dish?->visible)}}" @if($dish?->visible)
                  checked
                @endif>
              </div>
            </div>


                <button type="submit" class="btn btn-success">Salva</button>
                <button type="reset" class="btn btn-danger">Cancella</button>
            </form>

        </div>
    </main>

    {{-- Script CK editor 5 --}}
    <script>

        // Editor descrizione piatto
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );

        // Editor ingredienti piatto
    ClassicEditor
        .create( document.querySelector( '#ingredients' ) )
        .catch( error => {
            console.error( error );
        } );

    function showImage(event){
        const tagImage = document.getElementById('prev-image');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
    }

    function removeImage(){
          const imageInput = document.getElementById('image_path');
          imageInput.value = '';
          const tagImage = document.getElementById('prev-image');
          tagImage.src = '';
      }
  </script>

@endsection
