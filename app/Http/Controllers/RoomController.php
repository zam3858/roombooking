<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Room;
use App\User;
use App\Kegunaan;

class RoomController extends Controller
{

  public function __construct() {
    //$this->middleware( [ 'auth', 'branch' ]);
  }

	public function index() {

        $search_name = request('search_name');
        
        Artisan::call('kegunaan:proses');


        $rooms = Room::with( ['user', 'kegunaan'] )
                  ->when($search_name, function($query, $search_name) {

                        return $query->where('name', 'LIKE',  $search_name  . "%")
                                    ->orWhere('keterangan', 'LIKE', $search_name."%")

                        ;

                  })
                  ->paginate(10);
  
		return view( 'rooms.index', compact('rooms', 'search_name') );
	}

    public function create() {

        $users = User::all();
        $kegunaans = Kegunaan::all();

        return view('rooms.create', compact('users', 'kegunaans') );

    }

    public function store(Request $request) {

        $validateData = Validator::make($request->all(), [
                            'name' => [
                                function($attribute, $value, $fail) use ($request) {
                                    if(empty($value)) {
                                        return $fail($attribute.' is invalid.');
                                    }
                                },
                            ],
                        ]);

        dd($validateData->fails());

        //if fail validation, goes back to form create
        $validatedData = $request->validate([
            'name' => 'required',
            'level' => 'required'
        ]);

    	$room = new Room();

    	$room->name = request('name');
    	$room->level = request('level');
        $room->user_id = request('user_id');
        $room->kegunaan_id = request('kegunaan_id');

    	$room->save();

    	return redirect('/rooms');
    }

    
    public function show($id)
    {
        //Model::find()
        $room = Room::find($id);

        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dapatkan maklumat room 
        $room = Room::find($id);

        $users = User::all();
        $kegunaans = Kegunaan::all();

        return view('rooms.edit', compact('room', 'users', 'kegunaans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //dapatkan maklumat room 
        $room = Room::find($id);

        $room->name = request('name');
        $room->level = request('level');

        $room->save();

        return redirect('/rooms');
    }

    /**
     * Soft delete implemented the specified resource from storage.
     * 
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dapatkan maklumat room 
        $room = Room::withTrashed()->find($id);

        //delete rekod room
        $room->delete();
        
        return redirect('/rooms');
    }

    /**
    * Hard Delete record
    */
    public function hardDelete($id) {
        $room = Room::withTrashed()->find(5);
        $room->forceDelete();
        return redirect('/rooms');
    }

    public function getAllByRawQuery() {
        $rooms = DB::select("SELECT * FROM rooms");
        
        return view('rooms.index');
    }

    public function getAllWithJustSelectedField() {
        
        $rooms = Room::with( ['user', 'kegunaan'] )
                  ->when($search_name, function($query, $search_name) {

                        return $query->where('name', 'LIKE',  $search_name  . "%")
                                    ->orWhere('keterangan', 'LIKE', $search_name."%")

                        ;

                  })
                  ->when($search_user, function($query, $search_user) {

                        return $query->where('user_id',  $search_user );
                        
                  })
                  // ->orWhereHas('kegunaan', function ($query) use ($search_name) {

                    //     $query->where('name', 'LIKE', $search_name);
                    // })
                  ->get(['user', 'level' ,'kegunaan']);

        return view('rooms.index', compact('rooms'));
    }


    
}
