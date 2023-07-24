<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Dish;
use App\Http\Requests\OrderRequest;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::all();
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
    public function show(Order $order, Dish $dish)
    {
        $orders = Order::all();
        $dishes = Dish::all();

        $date = date_create($order->date);
        $date_formatted = date_format($date, 'd/m/Y' );

        return view('admin.orders.show', compact('order', 'orders', 'dish', 'dishes', 'date_formatted'));
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
