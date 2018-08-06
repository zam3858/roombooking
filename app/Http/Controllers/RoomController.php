<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
	public function index() {
		$rooms = Room::all();

		return view('rooms.index', ['rooms' => $rooms ]  );
	}

    public function create() {

    	return view('rooms.create');
    }

    public function store(Request $request) {

    	$room = new Room();

    	$room->name = request('name');
    	$room->level = request('level');

    	$room->save();

    	return redirect('/rooms');
    }

    
    public function show($id)
    {
        $room = Room::find($id);

        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
