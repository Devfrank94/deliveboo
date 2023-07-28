<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Braintree\Gateway;

class PageController extends Controller
{
    public function index(){
        return view('guest.home');
    }

    public function checkOut(){
      $json = file_get_contents('data.json');
      //prendo l'oggetto
      $data = json_decode($json);
      //salvo il prezzo
      $totalPrice = $data->price;
      //elimino il prezzo
      $dishes = $data->dishes;
      //ciclo per avere i dati

      $gateway = new Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
      ]);

      $token = $gateway->ClientToken()->generate();

      return view('guest.checkout', compact('dishes', 'token','totalPrice'));
    }

    public function processPayment(Request $request){
      $data = $request->all();

      $json = file_get_contents('data.json');
      $cart = json_decode($json);
      $dishes = $cart->dishes;
      $totalPrice = $cart->price;

      $gateway = new Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
      ]);

      $amount = $totalPrice;
      $nonce = $request->payment_method_nonce;

      $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'customer' => [
            'firstName' => $request->name,
            'lastName' => $request->surname,
            'email' => $request->email,
        ],
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if ($result->success) {
      $transaction = $result->transaction;
      // header("Location: transaction.php?id=" . $transaction->id);

        $new_order = new Order();
        $new_order->name_user = $request->name;
        $new_order->surname_user = $request->surname;
        $new_order->email_user = $request->email;
        $new_order->phone_number_user = $request->phone_number;
        $new_order->address_user = $request->address;
        $new_order->total_price = $totalPrice;
        $new_order->type_payment = 'Pay with card';
        $new_order->save();

        foreach ($dishes as $dish) {
          $new_order->dishes()->attach($dish->id, ['dish_quantity' => $dish->quantity]);
        }

      return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);;
    } else {
      $errorString = "";

      foreach ($result->errors->deepAll() as $error) {
          $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
      }

      // $_SESSION["errors"] = $errorString;
      // header("Location: index.php");
      return back()->withErrors('An error occurred with the message: '.$result->message);
    }
    }
}
