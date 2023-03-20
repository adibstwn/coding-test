@extends('layouts.index')

@section('content')
    <br />
    @csrf
    <div>
        <p class="h3">Save Match</p>
    </div>
    <form action="{{ url('liga') }}" method="POST">
        @csrf
        <div>
            <div class="d-flex">
                <div class="col-md-3 mt-2">
                    <label for="clubName">Home Club Name</label>
                    <select name="home_club" class="custom-select  mb-1">
                        <option selected value="">Select Club</option>
                        @foreach ($club as $key => $value)
                            <option value={{ $value->id }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('home_club') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <span class="mt-5">-</span>
                <div class="col-md-3 mt-2">
                    <label for="club">Away Club Name</label>
                    <select name="away_club" class="custom-select  mb-1">
                        <option selected value="">Select Club</option>
                        @foreach ($club as $key => $value)
                            <option value={{ $value->id }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('away_club') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <div class="col-3 mt-4 pt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-outline-dark" href="{{ url('liga') }}">Cancel</a>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3 mt-2">
                    <label for="skor">Home Score</label>
                    <input name="scoreClub0" type="text" class="form-control mb-1" id="skor">
                    @foreach ($errors->get('scoreClub0') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <span class="mt-5">-</span>
                <div class="col-md-3 mt-2">
                    <label for="skor2">Away Score</label>
                    <input name="scoreClub1" type="text" class="form-control" id="skor2">
                    @foreach ($errors->get('scoreClub1') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <div class="col-3">
                </div>
            </div>
        </div>
    </form>
@endsection
