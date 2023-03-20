@extends('layouts.index')

@section('content')
    <br />
    <div class="d-flex justify-content-between">
        <p class="h2">Liga Tarkam Standings 22/23</p>
        <div class="d-flex">
            <a class="btn btn-success mb-2 mr-3" href="{{ url('liga/create') }}">Save Match</a>
            <a class="btn btn-success mb-2" href="{{ url('multiple-match') }}">Save Multiple Match</a>
        </div>
    </div>
    <table class="table-bordered table text-center">
        <tr>
            <th>No</th>
            <th>Name Club</th>
            <th>Match</th>
            <th>Win</th>
            <th>Draw</th>
            <th>Lose</th>
            <th>GM</th>
            <th>GK</th>
            <th>Point</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->qty_match }}</td>
                <td>{{ $value->win }}</td>
                <td>{{ $value->draw }}</td>
                <td>{{ $value->lose }}</td>
                <td>{{ $value->GM }}</td>
                <td>{{ $value->GK }}</td>
                <td>{{ $value->point }}</td>
            </tr>
        @endforeach
    </table>
@endsection
