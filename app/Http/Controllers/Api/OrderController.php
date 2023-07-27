<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function getCart(Request $request)
  {
      $data = $request->all();

      return response()->json($data);
  }
}
