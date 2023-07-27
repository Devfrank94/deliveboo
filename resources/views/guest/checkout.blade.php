@extends('layouts.guest')

@section('content')

<div class="container my-5">
  <form id="payment-form" action="" method="post">
    @csrf
    <div id="dropin-container"></div>

    <label for="customer_name">Nome Cliente:</label>
    <input type="text" id="customer_name" name="customer_name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="address">Indirizzo:</label>
    <input type="text" id="address" name="address" required>

    <input type="submit" value="Pay with Braintree">
  </form>
</div>

{{-- <script src="https://js.braintreegateway.com/web/dropin/1.26.0/js/dropin.min.js"></script>
    <script>
        var form = document.getElementById('payment-form');
        var clientToken = "{{ Braintree\ClientToken::generate() }}";

        braintree.dropin.create({
            authorization: clientToken,
            container: '#dropin-container'
        }, function (createErr, instance) {
            if (createErr) {
                console.error(createErr);
                return;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error(err);
                        return;
                    }

                    // Include il payload in campi nascosti nel form e invia il form al tuo server per elaborare il pagamento
                    var nonceInput = document.createElement('input');
                    nonceInput.name = 'payment_method_nonce';
                    nonceInput.value = payload.nonce;
                    nonceInput.type = 'hidden';
                    form.appendChild(nonceInput);

                    form.submit();
                });
            });
        });
    </script> --}}

@endsection
