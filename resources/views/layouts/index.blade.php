<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
   

<body>
@if(count($errors)>0)
<ul>
@foreach($errors->all() as $error)



<li class="alert alert-danger">{{$error}}</li>
@endforeach

</ul>
   @endif

@yield('main')
</body>
</html>