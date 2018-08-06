@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<h3>Room list:</h3>
    	<ul>
    	@foreach($rooms as $room)

			<li>{{ $room->name }}, Level: {{ $room->level }}</li>

    	@endforeach
    	</ul>
    </div>
</div>
@endsection