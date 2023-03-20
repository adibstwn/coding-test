@extends('layouts.index')

@section('content')
    <br />
    <form action="{{ url('club') }}" method="POST">
        @csrf
        <div>
            <p class="h3">Create Club</p>
        </div>
        @include('club._form')
    </form>
@endsection
