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
    <div style="position: relative; top: 70px;">
      <table>
        <tr>
          <th style="padding: 30px;">Name</th>
          <th style="padding: 30px;">Email</th>
          <th style="padding: 30px;">Phone</th>
          <th style="padding: 30px;">Guest</th>
          <th style="padding: 30px;">Date</th>
          <th style="padding: 30px;">Time</th>
          <th style="padding: 30px;">Message</th>
        </tr>
        @foreach($data as $reservation)
        <tr align="center">
          <td>{{$reservation->name}}</td>
          <td>{{$reservation->email}}</td>
          <td>{{$reservation->phone}}</td>
          <td>{{$reservation->guest}}</td>
          <td>{{$reservation->date}}</td>
          <td>{{$reservation->time}}</td>
          <td>{{$reservation->message}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
    @include('admin.script')
  </body>
</html>