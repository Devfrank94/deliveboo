@extends('layouts.guest')

@section('content')


@if (session('success_message'))
<div class="alert alert-success">
    {{ session('success_message') }}
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="content container my-5">
  <h2 class=""><i class="fa-solid fa-truck"></i> Informazioni per la consegna: </h2>
  <form method="post" id="payment-form" action="{{ url('/checkout') }}">
      @csrf
      <section>
        <div class="form-group my-3 w-75">
          <label for="name">Nome:</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group my-3 w-75">
          <label for="surname">Cognome:</label>
          <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="form-group my-3 w-75">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group my-3 w-75">
          <label for="phone_number">Numero di telefono:</label>
          <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="form-group my-3 w-75">
          <label for="address">Indirizzo di consegna:</label>
          <input type="text" class="form-control" id="address" name="address" required>
        </div>
          <label for="amount">
              <h4 class="input-label my-4">Riepilogo Carrello</h4>
              <div class="input-wrapper amount-wrapper">

                @foreach ($dishes as $dish)
                  <div class="single-element d-flex align-items-center my-4">
                    <div class="img-container img-thumbnail w-25 me-4">
                      <img class="w-100" src="{{ asset('storage/' . $dish->image_path) }}" onerror="this.src='/img/no_image.jpg'" alt="{{ $dish->image_original_name }}">
                    </div>
                    <div class="info-element">
                      <h4>{{$dish->name}}</h4>
                      <p>Quantità : <span>{{$dish->quantity}}</span></p>
                      <p>Prezzo : <span>{{$dish->price}}</span></p>
                    </div>
                  </div>
                @endforeach

                <h4>Importo totale : {{$totalPrice}}</h4>
                  {{-- <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10"> --}}
              </div>
          </label>

          <div class="bt-drop-in-wrapper w-50">
              <div id="bt-dropin"></div>
          </div>
      </section>

      <input id="nonce" name="payment_method_nonce" type="hidden" />
      <button class="button btn btn-success" type="submit"><span>Paga</span></button>
  </form>
</div>

<!-- includes the Braintree JS client SDK -->
<script src="https://js.braintreegateway.com/web/dropin/1.39.0/js/dropin.min.js"></script><!-- includes jQuery -->
<script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

<script>
  var form = document.querySelector('#payment-form');
  var client_token ='{{$token}}' ;

  braintree.dropin.create({
    authorization: client_token,
    selector: '#bt-dropin',
  }, function (createErr, instance) {
    if (createErr) {
      console.log('Create Error', createErr);
      return;
    }
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      instance.requestPaymentMethod(function (err, payload) {
        if (err) {
          console.log('Request Payment Method Error', err);
          return;
        }

        // Add the nonce to the form and submit
        document.querySelector('#nonce').value = payload.nonce;
        form.submit();
      });
    });
  });
</script>
@endsection
