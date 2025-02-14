@extends ("layout")

@section ("content")
    <h1>Sociétée</h1>
    <div class="btn-pos">
        <button class="btn" onclick="location.href='{{ route('society.new') }}'">nouvelle société</button>
    </div>

    

@endsection