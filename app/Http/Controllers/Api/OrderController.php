<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function getCart(Request $request){
      $data = $request->all();
      $cart = [
        'price' => $data[0],
        'dishes' => $data[1]
      ];

      if(!empty($data)){
        $jsonInfo = json_encode($cart, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $jsonInfo);
        return response()->json(['success' => true]);
      }else{
        return response()->json(['success' => false]);
      }
  }
}
