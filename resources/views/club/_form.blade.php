<div class="form-group col-sm-3">
    <label for="clubName">Club Name</label>
    <input name="name" type="text" class="form-control col-sm-3" id="clubName" value="{{ $data->name }}">
    @foreach ($errors->get('name') as $msg)
        <p class="text-danger small">{{ $msg }}</p>
    @endforeach
</div>
<div class="form-group col-sm-3">
    <label for="clubCity">Club City</label>
    <input name="city" type="text" class="form-control col-sm-3" id="clubCity" value="{{ $data->city }}">
    @foreach ($errors->get('city') as $msg)
        <p class="text-danger small">{{ $msg }}</p>
    @endforeach
</div>
<div class="mt-3">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-outline-dark" href="{{ url('club') }}">Cancel</a>
</div>
