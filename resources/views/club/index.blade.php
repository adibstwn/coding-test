@extends('layouts.index')

@section('content')
    <br />
    <div class="d-flex justify-content-between">
        <p class="h2">All Club Liga Tarkam Data</p>
        <a class="btn btn-success mb-2" href="{{ url('admin/create-club') }}">Save</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
            <tr class="text-center text">
                <th class="col-sm-1">No</th>
                <th class="col-sm-7">Name</th>
                <th class="col-sm-3">City</th>
                <th class="col-sm-3">Action</th>
            </tr>
            @foreach ($data as $key => $value)
                <tr>
                    <td class="text-center"><strong>{{ $key + 1 }}</strong></td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->city }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a class="ml-2 btn btn-sm btn-info" href="{{ url('club/' . $value->id) }}">DETAIL</a>
                            <a class="ml-2 btn btn-sm btn-primary"
                                href="{{ url('club/' . $value->id . '/edit') }}">UPDATE</a>
                            <form action="{{ url('club/' . $value->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="ml-2 btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
