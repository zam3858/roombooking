<tr>
	<td>
		{{ $room->name }}
	</td>
	<td>
		{{ $room->level }}
	</td>
	<td>
		@if( ! empty($room->user) )
			{{ $room->user->name }}
		@endif
	</td>
	<td>
<a href="{{ url( '/rooms/' . $room->id ) }}" 
	class="btn btn-primary"
	title="View"
	>
	<i class="fa fa-eye"></i> 
	
</a>
<a href="{{ url( '/rooms/' . $room->id .'/edit' ) }}" 
	class="btn btn-secondary"
	title="Edit"
	>
	<i class="fa fa-edit"></i>
</a>

<form action="{{  url( '/rooms/' . $room->id ) }}" method="POST" 
	style="display:inline;"
	>
	@csrf
	<input name="_method" type="hidden" value="DELETE">
	<button
		class="btn btn-danger" 
		onClick="return confirm('Are you sure?');"
		title="Delete"
		>
		<i class="fa fa-trash"></i>
		
	</button>
</form>
	</td>
</tr>