@extends('layouts.index')

@section('main')
<table class="table">
  <thead>
    <tr>
      <th scope="col">File id</th>
      <th scope="col">File name</th>
      <th scope="col">View</th>
      <th scope="col">Download</th>
    </tr>
  </thead>
@foreach($fileModel as $fileModels)

  <tbody>
    <tr>
      <th scope="row">{{$fileModels->file_id}}
</th>
      <td>{{$fileModels->name_file}}</td>
      <td><a href="/viewFile/{{$fileModels->file_id}}">view</a> </td>
      <td><a href="/downloadFile/{{$fileModels->name_file}}">download</a></td>
    
    </tr>
    @endforeach
  </tbody>
</table>


<form action="{{ route('uploadFile', $id) }}" method="post" enctype="multipart/form-data">
@csrf
<input type="file" name="file_name" placeHolder="enter name"  class="m-4">
<button type="submit">Upload file</button>
</form>



 @endsection