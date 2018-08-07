@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<h3>
    		Room List

    		<a href="{{ url( '/rooms/create' ) }}"
						class="btn btn-primary"
						title="New"
						>
				<i class="far fa-plus-square"></i>
			</a>

    	</h3>
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
				title="View"
				>
				<i class="far fa-eye"></i> 
				
			</a>
			<a href="{{ url( '/rooms/' . $room->id .'/edit' ) }}" 
				class="btn btn-secondary"
				title="Edit"
				>
				<i class="fas fa-edit"></i>
			</a>

			<form action="{{  url( '/rooms/' . $room->id .'/delete' ) }}" method="POST" 
				style="display:inline;"
				>
				@csrf
				<button
					class="btn btn-danger" 
					onClick="return confirm('Are you sure?');"
					title="Delete"
					>
					<i class="fas fa-trash"></i>
					
				</button>
			</form>
				</td>
			</tr>
    	@endforeach
    	</table>
    </div>
</div>
@endsection