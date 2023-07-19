@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" onsubmit="return (validateForm(this) && validateCheckbox())" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"  autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!------------------------------------------------------------ CUSTOM PART-------------------------------------------------------->
                        <div class="mb-4 row">
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
                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address Restaurants') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('P. Iva Restaurants') }}</label>

                            <div class="col-md-6">
                                <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus>

                                @error('p_iva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                          <label class="col-md-4 col-form-label text-md-right">Typologies</label>
                          <div class="btn-group d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group">
                              @foreach ($typologies as $typology)
                                  <input
                                      type="checkbox"
                                      class="btn-check form-control @error('typologies[]') is-invalid @enderror"
                                      id="typology{{$loop->iteration}}"
                                      value="{{$typology->id}}"
                                      name="typologies[]"
                                      autocomplete="off"
                                      @if (in_array($typology->id, old('typologies', [])))
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
                        <!------------------------------------------------------------ CUSTOM PART-------------------------------------------------------->

                        <div class="w-100 mt-5">
                            <div class="w-100 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Registrati
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script language="javascript" type="text/javascript">

  function validateForm(passwordForm){
    if(passwordForm.password.value == ""){
      alert("Devi inserire una password!")
      passwordForm.password.focus()
      return false
    }
    if(passwordForm.password.value != passwordForm.password_confirmation.value){
      alert("Le due password inserite non sono uguali!")
      passwordForm.password.focus()
      passwordForm.password.select()
      return false
    }
    return true
  }

  function validateCheckbox(){
    var form_data = new FormData(document.querySelector("form"));

    if(!form_data.has("typologies[]")){
      alert("Devi scegliere almeno una tipologia!")
      return false;
    }
    else{
      return true;
    }
  }

</script>

@endsection
