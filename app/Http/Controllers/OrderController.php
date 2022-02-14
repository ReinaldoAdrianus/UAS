<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Session;

class OrderController extends Controller
{
    public function cart()
    {
        $orders = Order::where('account_id', Auth::id())->whereNull('order_date')->get();
        return view('cart')->with('carts', $orders);
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('cart')->with('success', 'Delete item from cart success!');
    }

    public function submit()
    {
        $orders = Order::where('account_id', Auth::id())
            ->whereNull('order_date')
            ->update(['order_date' => new \DateTime()]);

        return redirect()->route('success')->with('message', 'Success!');
    }

    public function success()
    {
        $message = \Session::get('message');
        return view('success')->with('message', $message);
    }
}
