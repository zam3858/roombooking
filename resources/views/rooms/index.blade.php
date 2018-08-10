@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<h3>
    		Room List

    		<a href="{{ url( '/rooms/create' ) }}"
						class="btn btn-primary"
						title="New"
						>
				<i class="fa fa-plus-square"></i>
			</a>

    	</h3>
    	<div class="container">
    		<form method="GET" class="col-md-12">
				<div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Search</label>

                    <div class="col-md-6">
                        <input id="search_name" type="text" class="form-control"
                               name="search_name"
								value="{{ $search_name }}"
                                >
                    </div>
                    <div class="col-md-2">
                    	<button type="submit" class="btn btn-primary">
                    		<i class="fas fa-search"></i>
                    	</button>
                	</div>
                </div>
    		</form>
    	</div>
    	<table class="table table-striped">
    		<tr>
    			<th>Name</th>
    			<th>Level</th>
    			<th>Penjaga</th>
    			<th></th>
    		</tr>
    	@foreach($rooms as $room)

			@include('rooms.trtdroom')

    	@endforeach
    	</table>
    	{{ 
    		$rooms
    		->appends( ['search_name' => $search_name ] )
    		->links() 
    	}}

		

    </div>
</div>
@endsection