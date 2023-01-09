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
    <div style="position: relative; top: 60px; right: -100px;">
      @if(session()->has('message'))
        <div class="alert alert-success">
          {{session()->get('message')}}
        </div>
      @endif
      <form action="{{url('chefedit',$data->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div style="padding: 15px;">
              <label>Chef Name</label>
              <input style="color: blue" type="text" name="name" value="{{$data->name}}" required="">
          </div>
          <div style="padding: 15px;">
              <label>Speciality</label>
              <input style="color: blue" type="text" name="speciality" value="{{$data->speciality}}"
              required="">
          </div>
          <div style="padding: 15px;">
              <label>Old Image</label>
              <img src="/chefimage/{{$data->image}}" height="100" width="100">
          </div>
          <div style="padding: 15px;">
              <label>New Image</label>
              <input type="file" name="image" required="">
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