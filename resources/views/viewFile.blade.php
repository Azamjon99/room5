@extends('layouts.index')

@section('main')


<h2>{{$file->name_file}}</h2>

<iframe src="{{url('storage/files/'.$file->name_file)}}" class="container" frameborder="0"></iframe>

@endsection