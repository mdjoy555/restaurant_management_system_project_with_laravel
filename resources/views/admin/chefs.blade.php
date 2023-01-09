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
    <div style="position: relative; top: 60px; right: -100px;">
      @if(session()->has('message'))
        <div class="alert alert-success">
          {{session()->get('message')}}
        </div>
      @endif
      <form action="{{url('/uploadchef')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="padding: 15px;">
          <label>Name</label>
          <input style="color: blue;" type="text" name="name" placeholder="Enter Name"
          required="">
        </div>
        <div style="padding: 15px;">
          <label>Speciality</label>
          <input style="color: blue;" type="text" name="speciality" placeholder="Enter the Speciality"
          required="">
        </div>
        <div style="padding: 15px;">
          <label>Image</label>
          <input type="file" name="image" required="">
        </div>
        <div style="padding: 15px;">
          <input class="btn btn-primary" type="submit" value="Save">
        </div>
      </form>
      <table bgcolor="black">
        <tr>
          <th style="padding: 30px;">Chef Name</th>
          <th style="padding: 30px;">Speciality</th>
          <th style="padding: 30px;">Image</th>
          <th style="padding: 30px;">Update</th>
          <th style="padding: 30px;">Delete</th>
        </tr>
        @if(count($data)>0)
        @foreach($data as $chef)
        <tr align="center">
          <td>{{$chef->name}}</td>
          <td>{{$chef->speciality}}</td>
          <td><img src="/chefimage/{{$chef->image}}" height="100" width="100"></td>
          <td><a class="btn btn-primary" href="{{url('chefupdate',$chef->id)}}">Update</a></td>
          <td><a class="btn btn-danger" href="{{url('chefdelete',$chef->id)}}"
          onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
        </tr>
        @endforeach
        @else
          <tr><td><td><td style="padding: 10px; font-size: 20px;">
          There is no product</td></td></td></tr>
        @endif
      </table>
    </div>
  </div>
    @include('admin.script')
  </body>
</html>