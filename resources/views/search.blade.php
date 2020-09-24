@extends('layouts.index')

@section('main')

@foreach($datas as $data)

<div class="m-4 p-4">inside: <a href="{{route('showCell', ['id'=>$data->archive_id])}}">{{$data->name_archive}}</a>/ <a href="{{route('showFolder', ['id'=>$data->cell_id])}}">{{$data->name_cell}}</a></div>

<div class="m-4 p-4">result: <b>{{$data->name_folder}}</b></div>


@endforeach

@endsection