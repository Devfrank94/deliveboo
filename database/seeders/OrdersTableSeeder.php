<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('orders');

        foreach($orders as $order){

          $new_order = new Order();

          $new_order->id                = $order['order_id'];
          $new_order->name_user         = $order['name_user'];
          $new_order->surname_user      = $order['surname_user'];
          $new_order->email_user        = $order['email_user'];
          $new_order->phone_number_user = $order['phone_number_user'];
          $new_order->address_user      = $order['address_user'];
          $new_order->type_payment      = $order['type_payment'];
          $new_order->total_price       = $order['total_price'];

          $new_order->save();

        }
    }
}
