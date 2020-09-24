@extends('layouts.index')

@section('main')







<div class="container  text-center " >
<b>{{Session('status')}}</b>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Cell id</th>
      <th scope="col">Cell name</th>
      <th scope="col">View</th>
      <th scope="col">Delete</th>
  
    </tr>
  </thead>
    @foreach($datas as $data)

    <tbody>

<tr>
  <th scope="row">
{{$data->cell_id}}
</th>

<td>{{$data->name_cell}}</td>
<td><a href="{{route('showFolder', ['id'=>$data->cell_id])}}">enter</a> </td>

<td><form action="{{route('deleteCell', ['id'=>$data->cell_id])}}" method="post">
@csrf
@method('DELETE')
<button>Delete</button>
</form></td>




















  @endforeach


<form action="{{ route('createCell', $id) }}" method="post">
@csrf
<input type="text" name="cell_name" placeHolder="enter name"  class="m-4">
<button type="submit">Create new cell</button>
</form> 
@endsection