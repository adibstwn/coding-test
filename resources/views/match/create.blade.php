@extends('layouts.index')

@section('content')
    <br />
    @csrf
    <div>
        <p class="h3">Create Match</p>
    </div>
    <form action="{{ url('match') }}" method="POST">
        @csrf
        <div>
            <div class="d-flex">
                <div class="col-md-3 mt-3">
                    <label for="clubName">Home Club Name</label>
                    <select name="home" class="form-select  mb-1">
                        <option selected value="">Select Club</option>
                        @foreach ($club as $key => $value)
                            <option value={{ $value->id }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('home') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <span class="mt-5 mx-2">-</span>
                <div class="col-md-3 mt-3">
                    <label for="club">Away Club Name</label>
                    <select name="away" class="form-select  mb-1">
                        <option selected value="">Select Club</option>
                        @foreach ($club as $key => $value)
                            <option value={{ $value->id }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('away') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3 mt-3">
                    <label for="seat">Available Seats</label>
                    <input name="available_seat" type="text" class="form-control mb-1" id="seat">
                    @foreach ($errors->get('available_seat') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <span class="mt-5 mx-3"></span>
                <div class="col-md-2 mt-3">
                    <label for="seat">Price/Seat (in Rp.)</label>
                    <input name="price" type="text" class="form-control mb-1" id="seat">
                    @foreach ($errors->get('price') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <div class="col-3">
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-3 mt-3">
                    <label for="seat">Match are held in</label>
                    <select name="address" class="form-select  mb-1">
                        <option selected value="">Select City</option>
                        @foreach ($club as $key => $value)
                            <option value={{ $value->id }}>{{ $value->city }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('address') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <span class="mt-5 mx-3"></span>
                <div class="col-md-2 mt-3">
                    <label for="match_day" class="mb-1">Match Day</label>
                    <br>
                    <input type="date" name="match_day" id="match_day">
                    @foreach ($errors->get('match_day') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <div class="col-md-2 mt-3">
                    <label for="match_day" class="mb-1">Time</label>
                    <br>
                    <x-input-time-select name="time" value="09:30"></x-input-time-select>
                    @foreach ($errors->get('match_day') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
            </div>
            <div class="col-3 mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-outline-dark" href="{{ url('match') }}">Cancel</a>
            </div>
        </div>
    </form>
@endsection
