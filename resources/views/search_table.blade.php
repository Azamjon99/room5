<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<form class="form-inline justify-content-center" action="/searchData"> 
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" name="search" placeholder="Search"
    aria-label="Search">


</form>

@foreach($data as $room)

<table class="table table-bordered">
    <thead>
      <tr>
        <th>{{$room->name_archive}}</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$room->name_folder}}</td>
      </tr>
    </tbody>
  </table>
  @endforeach

</body>
</html>