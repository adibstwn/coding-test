@extends('layouts.index')

@section('content')
    <br />
    @csrf
    <div>
        <p class="h3">Save Multiple Match</p>
    </div>
    <form action="{{ url('admin/multiple-match') }}" method="POST">
        @csrf
        <div id="dynamicAddRemove">
            <div class="d-flex">
                <div class="col mt-3">
                    <label for="clubName"><strong> Home Club Name</strong></label>
                    <select name="club[0]" class="form-select  mb-1">
                        <option selected value="">Select Club</option>
                        @foreach ($club as $key => $value)
                            <option value={{ $value->id }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('club.0') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <div class="mt-5 mx-2">-</div>
                <div class="col mt-3">
                    <label for="club"><strong>Away Club Name</strong></label>
                    <select name="club[1]" class="form-select  mb-1">
                        <option selected value="">Select Club</option>
                        @foreach ($club as $key => $value)
                            <option value={{ $value->id }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @foreach ($errors->get('club.1') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <div class="col mt-3 ml-4">
                    <label for="home_score"><strong>Home Score Club</strong></label>
                    <input name="scor[0]" type="text" class="form-control" id="home_score">
                    @foreach ($errors->get('scor.0') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <span class="mt-5 mx-2">-</span>
                <div class="col mt-3">
                    <label for="away_score"><strong>Away Score Club</strong></label>
                    <input name="scor[1]" type="text" class="form-control" id="away_score">
                    @foreach ($errors->get('scor.1') as $msg)
                        <p class="text-danger small">{{ $msg }}</p>
                    @endforeach
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <div class="mt-1 pl-3">
            <button type="button" name="add" id="addMatch" class="btn btn-outline-success">Add</button>
        </div>
        <div class="my-4 pl-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-outline-dark" href="{{ url('liga') }}">Cancel</a>
        </div>
    </form>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 1;
        $("#addMatch").click(function() {
            var away = i + 2;
            ++i;
            $('#dynamicAddRemove').append(
                '<div class = "d-flex child' + i +
                '" id = "dynamicAddRemove" ><div class = "col mt-3" > <label><strong> Home Club Name </strong></label> <select name = "club[' +
                i +
                ']"class = "form-select  mb-1" ><option selected > Select Club </option> @foreach ($club as $key => $value)<option value = {{ $value->id }} > {{ $value->name }} </option> @endforeach </select> @foreach ($errors->get("club.'+i+'") as $msg) <p class="text-danger small">{{ $msg }}</p> @endforeach </div> <span class = "mt-5 mx-2" > - </span> <div class = "col mt-3" ><label><strong> Away Club Name </strong></label> <select name = "club[' +
                away +
                ']" class = "form-select  mb-1" ><option selected > Select Club </option> @foreach ($club as $key => $value)<option value = {{ $value->id }} > {{ $value->name }} </option> @endforeach </select> @foreach ($errors->get("club.'+i+'") as $msg) <p class="text-danger small">{{ $msg }}</p> @endforeach </div> <div class = "col mt-3 ml-4" ><label for = "home_score"><strong>Home Score Club</strong></label> <input name = "scor[' +
                i +
                ']"type = "text"class = "form-control"id = "home_score" > @foreach ($errors->get("scor.'+i+'") as $msg) <p class="text-danger small">{{ $msg }}</p> @endforeach </div> <span class = "mt-5 mx-2" > - </span> <div class = "col mt-3" ><label for = "away_score"><strong>Away Score Club</strong></label> <input name = "scor[' +
                away +
                ']" type = "text" class = "form-control" id = "away_score" >  @foreach ($errors->get("scor.'+i+'") as $msg) <p class="text-danger small">{{ $msg }}</p> @endforeach</div> <div class="col mt-4 remove-input-field"> <button class="btn bg-transparent mt-2"> <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" fill="red"></path> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" fill="red"></path></svg> </button> </div> </div>'
            );
            ++i;
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parent().remove();
        });
    </script>
@endsection
