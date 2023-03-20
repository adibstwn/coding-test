@extends('layouts.index')

@section('content')
    <br />
    <form action="{{ url('club/' . $data->id) }}" method="POST">
        @csrf
        <div>
            <p class="h3">Update Club</p>
        </div>
        <input type="hidden" name="_method" value="PATCH">
        @include('club._form')
    </form>
@endsection
