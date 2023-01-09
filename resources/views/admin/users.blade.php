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
    <div style="position: relative; top: 60px; right: -150px;">
      @if(session()->has('message'))
        <div class="alert alert-success">
          {{session()->get('message')}}
        </div>
      @endif
      <table bgcolor="gray" border="3px">
        <tr align="center">
          <td style="padding: 15px;">Name</td>
          <td style="padding: 15px;">Email</td>
          <td style="padding: 15px;">Action</td>
        </tr>
        @foreach($data as $user)
        <tr align="center">
          <td style="padding: 15px;">{{$user->name}}</td>
          <td style="padding: 15px;">{{$user->email}}</td>
          @if($user->usertype=='0')
            <td style="padding: 15px;"><a class="btn btn-danger" href="{{url('userdelete',$user->id)}}"
            onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
          @else
            <td style="padding: 15px;">Not allowed</td>
          @endif
        </tr>
        @endforeach
      </table>
    </div>
  </div>
    @include('admin.script')
  </body>
</html>