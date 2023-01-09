<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')    
  </head>
  <body>
  <div class="container-scroller">
    @include('admin.navbar')
    <div style="position: relative; top: 60px; right: -150px;">
        @if(session()->has('message'))
          <div class="alert alert-success">
            {{session()->get('message')}}
          </div>
        @endif
        <form action="{{url('/foodedit',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="padding: 15px;">
                <label>Title</label>
                <input style="color: black;" type="text" name="title" value="{{$data->title}}" required>
            </div>
            <div style="padding: 15px;">
                <label>Price</label>
                <input style="color: black;" type="number" name="price" value="{{$data->price}}" required>
            </div>
            <div style="padding: 15px;">
                <label>Old Image</label>
                <img src="/foodimage/{{$data->image}}" height="100" width="100">
            </div>
            <div style="padding: 15px;">
                <label>Image</label>
                <input type="file" name="image" required>
            </div>
            <div style="padding: 15px;">
                <label>Description</label>
                <input style="color: black;" type="text" name="description" value="{{$data->description}}" required>
            </div>
            <div style="padding: 15px;">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
  </div>
    @include('admin.script')
  </body>
</html>