@extends('layouts.index')

@section('main')




<form class="form-inline justify-content-center" action="/searchData"> 
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75 p-4" type="text" name="search" placeholder="find folder"
    aria-label="Search">
<div class="container  text-center " >
<b>{{Session('status')}}</b>
</div>
</form
<div class="container  justify-content-center " >
@foreach($data as $datas)
<a href="{{route('showCell', ['id'=>$datas->archive_id])}}"  class="w-100 flex-column flex-wrap" >
<div class="w-20 p-4 m-4 text-center" style="border:1px solid black">
            {{$datas->name_archive}}
</div>
</a>
@endforeach
<form action="/createCabinet" method="post">
@csrf
<input type="text" name="cabinet_name" placeHolder="enter name"  class="m-4">
<button type="submit">Create new cabinet</button>
</form>

</div>


@endsection