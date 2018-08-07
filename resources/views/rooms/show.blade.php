@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<h3>Room</h3>
    	<p>Name: {{ $room->name }}</p>
    	<p>Level: {{ $room->level }}</p>
		<p>
			<a href="{{ url( '/rooms' ) }}" 
						class="btn btn-primary"
						>Back</a>
		</p>
    	
    </div>
</div>
@endsection