@extends('layouts.index')

@section('content')
    <br />
    @csrf
    <a class="btn btn-outline-info btn-sm" href="{{ url('club') }}">Back</a>
    <div class="my-3">
        <p class="h3">Detail Club {{ $data->name }}</p>
    </div>
    <div>
        <p class="h5">Club Name : {{ $data->name }}</p>
    </div>
    <div class="my-3">
        <p class="h5">Club City : {{ $data->city }}</p>
    </div>
@endsection
