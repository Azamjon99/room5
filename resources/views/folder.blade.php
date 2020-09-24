
@extends('layouts.index')

@section('main')


<div class="container  text-center " >
<b>{{Session('status')}}</b>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Folder id</th>
      <th scope="col">Folder name</th>
      <th scope="col">View</th>
      <th scope="col">Change Location</th>
      <th scope="col">Delete Folder</th>
    </tr>
  </thead>
    @foreach($datas as $data)
  <tbody>

      <tr>
        <th scope="row">
{{$data->folder_id}}
</th>

<td>{{$data->name_folder}}</td>
      <td><a href="{{route('showFiles', ['id'=>$data->folder_id])}}">enter</a> </td>
      <td><a href="{{route('changeView', ['id'=>$data->folder_id])}}">Change Location</a></td>
    


<td>
<form action="{{route('deleteFolder', ['id'=>$data->folder_id])}}" method="post">
@csrf
@method('DELETE')
<button>Delete</button>
</form>
</td>




  
  @endforeach

    </thead>
   
  </table>


<form action="{{ route('createFolder', $id) }}" method="post">
@csrf
<input type="text" name="folder_name" placeHolder="enter name"  class="m-4">
<button type="submit">Create new folder</button>
</form> 



@endsection