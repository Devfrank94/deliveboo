<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Dish;
use App\Http\Requests\OrderRequest;
use App\Models\DishOrder;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ordersArray = [];
      $orders = [];
      $orders_ids = [];
      $order_pivot = [];
      $restaurant = Restaurant::where('user_id', '=', Auth::user()->id)->first();
      $dishes     = $restaurant->dishes()->get();
      foreach($dishes as $dish){
        $order_pivot    = DishOrder::where('dish_id', $dish->id)->get();
        foreach ($order_pivot as $order) {
          if(!in_array($order->order_id, $orders_ids)){
            $orders_ids[] = $order->order_id;
          }
        }
      }

      asort($orders_ids);

      foreach($orders_ids as $orderItem){
        $order = Order::where('id', $orderItem)->with('dishes')->first();
        if($order != null && !in_array($order, $orders)){
          $orders[] = $order;
        };
      }

      return view('admin.orders.index', compact('orders'));
    }

    public function orderStatistics()
    {
        $orders = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_price) as total_amount')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $data = [
            'labels' => [],
            'amounts' => []
        ];

        foreach ($orders as $order) {
            $data['labels'][] = Carbon::createFromDate($order->year, $order->month)->format('M Y');
            $data['amounts'][] = $order->total_amount;
        }

        return view('admin.restaurant.order-statistics', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
      $restaurant = Restaurant::where('user_id', '=', Auth::user()->id)->first();
      $order_pivot = DishOrder::where('order_id', $order->id)->get();

      return view('admin.orders.show', compact('order', 'order_pivot', 'restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orders = Order::all();
        $dishes = Dish::all();
        return view('admin.orders.edit',compact('order', 'dishes', 'orders') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
      $form_data=$request->all();

      $order->update($form_data);

      return redirect()->route('admin.orders.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
