<?php

namespace App\Http\Controllers\User;

use App\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id',$id)->latest()->get();

        return view('user.dashboard', compact('orders'));
    }

    public function order($id)
    {
        $order = Order::find($id);

        return view('user.order', compact('order'));
    }

    public function delete($id)
    {
        $tree = Order::find($id);

        $tree->delete();

        Toastr::success('Successfully Deleted !' ,'Order');
        return redirect()->back();

    }


}
