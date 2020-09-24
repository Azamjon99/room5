@extends('layouts.index')

@section('main')

<form method="post" class="form-inline justify-content-center" action="{{route('changeLocation', $id)}}"> 
@csrf
  <i class="fas fa-search" aria-hidden="true"></i>
  
  <input class="form-control form-control-sm ml-5 w-75 p-4" type="text" name="cell_id" placeholder="enter cell id">

<button type="submit">Submit</button>
    </form>

    
@endsection