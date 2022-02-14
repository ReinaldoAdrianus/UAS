<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class EBookController extends Controller
{
    public function show($id)
    {
        $selectedEBook = Ebook::find($id);
        return view('ebook-detail')->with('ebook', $selectedEBook);
    }

    public function rent($id)
    {
        $order = new Order;
        $order->account_id = Auth::id();
        $order->ebook_id = $id;
        $order->save();

        return redirect()->route('home')->with('success', 'Rent success!');
    }
}
