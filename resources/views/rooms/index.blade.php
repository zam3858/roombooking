@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<h3>Room list:</h3>
    	<table class="table table-striped">
    		<tr>
    			<th>Name</th>
    			<th>Level</th>
    			<th></th>
    		</tr>
    	@foreach($rooms as $room)
			<tr>
				<td>
					{{ $room->name }}
				</td>
				<td>
					{{ $room->level }}
				</td>
				<td>
					<a href="{{ url( '/rooms/' . $room->id ) }}" 
						class="btn btn-primary"
						>View</a>
				</td>
			</tr>
    	@endforeach
    	</table>
    </div>
</div>
@endsection