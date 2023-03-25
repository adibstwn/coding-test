@extends('layouts.index')

@section('content')
    <br />
    <div class="d-flex justify-content-between">
        <p class="h2">Available Match</p>
        @if (Auth::user()->role == '1')
            <a class="btn btn-success mb-2" href="{{ url('admin/create-match') }}">Create Match</a>
        @endif
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
            <tr class="text-center text">
                <th class="col-sm">No</th>
                <th class="col-sm-2">Home</th>
                <th class="col-sm-2">Away</th>
                <th class="col-sm">Date</th>
                <th class="col-sm">Time</th>
                <th class="col-sm-2">Held At</th>
                <th class="col-sm">Availbl Seat</th>
                <th class="col-sm">Price/Seat</th>
                <th class="col-sm-1">Action</th>
            </tr>
            @foreach ($data as $key => $value)
                <tr class="text-center">
                    <td><strong>{{ $key + 1 }}</strong></td>
                    <td>{{ $value->home_name }}</td>
                    <td>{{ $value->away_name }}</td>
                    <td>{{ $value->match_day }}</td>
                    <td>{{ $value->time }}</td>
                    <td>{{ $value->address_name }}</td>
                    <td>{{ $value->available_seat }}</td>
                    <td>{{ $value->price }}</td>
                    {{-- <td><a class="ml-2 btn btn-sm btn-primary" href="{{ url('club/' . $value->id . '/edit') }}">BUY</a> --}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
