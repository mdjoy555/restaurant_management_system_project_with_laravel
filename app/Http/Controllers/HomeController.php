<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = Food::all();
            $data2 = Chef::all();

            return view('home',compact('data','data2'));
        }
    }

    public function redirect()
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            $data = Food::all();
            $data2 = Chef::all();

            if($usertype=='1')
            {
                return view('admin.home');
            }
            else
            {
                $user_id = Auth::id();
                $count = Cart::where('user_id',$user_id)->count();

                return view('home',compact('data','data2','count'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function addcart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;
            $cart->save();

            return redirect()->back()->with('message','Cart Added Successfully');
        }
        else
        {
            return redirect('login');
        }
    }

    public function showcart($id)
    {
        $count = Cart::where('user_id',$id)->count();
        if(Auth::id()==$id)
        {
            $data = Cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();
            $data2 = Cart::select('*')->where('user_id','=',$id)->get();

            return view('showcart',compact('count','data','data2'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function deletecart($id)
    {
        $data = Cart::find($id);
        $data->delete();

        return redirect()->back()->with('message','Cart Deleted Successfully');
    }

    public function order(Request $request)
    {
        foreach($request->foodname as $key=>$foodname)
        {
            $data = new Order;
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();
        }

        return redirect()->back()->with('message','Ordered Successfully');
    }
}
