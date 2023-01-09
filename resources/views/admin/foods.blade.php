<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')    
  </head>
  <body>
  <div class="container-scroller">
    @include('admin.navbar')
    <div style="position: relative; top: 60px; right: -50px;">
        @if(session()->has('message'))
          <div class="alert alert-success">
            {{session()->get('message')}}
          </div>
        @endif
        <form action="{{url('/uploadfood')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="padding: 15px;">
                <label>Title</label>
                <input style="color: black;" type="text" name="title" placeholder="Title" required>
            </div>
            <div style="padding: 15px;">
                <label>Price</label>
                <input style="color: black;" type="number" name="price" placeholder="Price" required>
            </div>
            <div style="padding: 15px;">
                <label>Image</label>
                <input type="file" name="image" required>
            </div>
            <div style="padding: 15px;">
                <label>Description</label>
                <input style="color: black;" type="text" name="description" placeholder="Description" required>
            </div>
            <div style="padding: 15px;">
                <input class="btn btn-primary" type="submit" value="Save">
            </div>
        </form>
        <div>
          <table bgcolor="black" class="mt-3">
            <tr>
              <th style="padding: 30px;">Name</th>
              <th style="padding: 30px;">Price</th>
              <th style="padding: 30px;">Description</th>
              <th style="padding: 30px;">Image</th>
              <th style="padding: 30px;">Update</th>
              <th style="padding: 30px;">Delete</th>
            </tr>
            @if(count($data)>0)
              @foreach($data as $food)
              <tr align="center">
                <td>{{$food->title}}</td>
                <td>{{$food->price}}</td>
                <td>{{$food->description}}</td>
                <td><img src="/foodimage/{{$food->image}}" height="100" width="100"></td>
                <td>
                  <a class="btn btn-primary" href="{{url('foodupdate',$food->id)}}">Update</a>
                </td>
                <td>
                  <a class="btn btn-danger" href="{{url('fooddelete',$food->id)}}"
                  onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                </td>
              </tr>
              @endforeach
            @else
              <tr><td><td><td style="padding: 10px; font-size: 20px;">
              There is no food</td></td></td></tr>
            @endif
          </table>
        </div>
    </div>
  </div>
    @include('admin.script')
  </body>
</html>