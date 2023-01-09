<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;

class AdminController extends Controller
{
    public function users()
    {
        $data = User::all();

        return view('admin.users',compact('data'));
    }

    public function userdelete($id)
    {
        $data = User::find($id);
        $data->delelte();

        return redirect()->back()->with('message','User Deleted Successfully');
    }

    public function foods()
    {
        $data = Food::all();

        return view('admin.foods',compact('data'));
    }

    public function uploadfood(Request $request)
    {
        $data = new Food;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect()->back()->with('message','Food Added Successfully');
    }

    public function foodupdate($id)
    {
        $data = Food::find($id);

        return view('admin.foodupdate',compact('data'));
    }

    public function foodedit(Request $request,$id)
    {
        $data = Food::find($id);
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('foodimage',$imagename);
            $data->image = $imagename;
        }
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect()->back()->with('message','Food Updated Successfully');
    }

    public function fooddelete($id)
    {
        $data = Food::find($id);
        $data->delete($id);

        return redirect()->back()->with('message','Food Deleted Successfully');
    }

    public function reservation(Request $request)
    {
        $data = new Reservation;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();

        return redirect()->back()->with('message','Message Sent Successfully');
    }

    public function reservations()
    {
        if(Auth::id())
        {
            $data = Reservation::all();

            return view('admin.reservations',compact('data'));
        }
        else
        {
            return redirect('login');        
        }
    }

    public function chefs()
    {
        $data = Chef::all();

        return view('admin.chefs',compact('data'));
    }

    public function uploadchef(Request $request)
    {
        $data = new Chef;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage',$imagename);
        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();

        return redirect()->back()->with('message','Chef Added Successfully');
    }

    public function chefupdate($id)
    {
        $data = Chef::find($id);

        return view('admin.chefupdate',compact('data'));
    }

    public function chefedit(Request $request,$id)
    {
        $data = Chef::find($id);
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage',$imagename);
            $data->image = $imagename;
        }
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();

        return redirect()->back()->with('message','Chef Updated Successfully');
    }

    public function chefdelete($id)
    {
        $data = Chef::find($id);
        $data->delelte();

        return redirect()->back()->with('message','Chef Deleted Successfully');
    }

    public function orders()
    {
        $data = Order::all();

        return view('admin.orders',compact('data'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = Order::where('name','Like','%'.$search.'%')
        ->orWhere('foodname','Like','%'.$search.'%')
        ->orWhere('phone','Like','%'.$search.'%')
        ->orWhere('address','Like','%'.$search.'%')->get();

        return view('admin.orders',compact('data'));
    }
}
