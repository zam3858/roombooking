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
      //ini akan memberitahu laravel supaya menggunakan middleware auth supaya
      // mewajibkan user login sebelum meng-access apa sahaja dalam
    $this->middleware( [ 'auth']);
  }

	public function index() {

        $search_name = request('search_name');
        
        Artisan::call('kegunaan:proses');

        $x = 10;

        $rooms = Room::with( ['user', 'kegunaan'] )
                  /**
                   * ->when($variable, function() {})
                   *  apabila $variable dinilai true, function akan di run
                   *
                   */
                  ->when($search_name, function($query, $search_name) {

                        return $query->where('name', 'LIKE',  $search_name  . "%")
                                    ->orWhere('keterangan', 'LIKE', $search_name."%")

                        ;

                  })
                    /**
                     * untuk susun rekod supaya nama keluar mengikut susunan
                     * abjad menaik
                     */
                  ->orderBy('name', 'ASC')
                    /**
                     * ->paginate(10) akan memulangkan $x rekod (dalam code ini, $x diset pada line 27 )
                     * dan menggunakan request('page') untuk menentukan permulaan 10
                     *
                     */
                  ->paginate(10);

        /**
         * view() akan load page untuk dipaparkan kepada pengguna.
         *      'rooms.index' akan mencapai resources/views/rooms/index.blade.php.
         *      parameter kedua iaitu compact('rooms', 'search_name') akan
         */
		return view( 'rooms.index', compact('rooms', 'search_name') );
	}

    public function create() {

        /**
         * ini untuk mendapatkan maklumat user dan kegunaan untuk di isi kedalam <select>
         *  di dalam form create
         * Model::all() adalah untuk mendapatkan semua rekod dalam table yang dibaca Model
         */
        $users = User::all();
        $kegunaans = Kegunaan::all();

        return view('rooms.create', compact('users', 'kegunaans') );

    }

    public function store(Request $request) {

        /**
         * validation paling mudah adalah menggunakan $request->validate();
         * jika data yang dihantar tidak melepasi validation rules ditetapkan,
         * $request->validate() akan memanggil back()->withInput();
         * dimana ini akan kembali ke create() dan membawa
         * input2 diisi pengguna dan memaparkan input pengguna menggunakan
         * old('namafield')
         *
        */
        $validatedData = $request->validate([
            'name' => 'required',
            'level' => 'required'
        ]);

        /**
         * berikut adalah kaedah untuk mengisi rekod room.
         *  cara pertama ialah dengan menggunakan pattern
         *  $room->namafield = $value_untuk_namafield
         *
         *  cara kedua ialah dengan menggunakan pattern
         *  $room = new Room(['namafield1' => $valuefield1, 'namafield2' => $valuefield2  ]
         *   cuma dengan menggunakan cara ini, perlu diset $guarded atau $fillable pada model terlibat (Room)
         */
    	$room = new Room();

    	$room->name = request('name');
    	$room->level = request('level');
        $room->user_id = request('user_id');
        $room->kegunaan_id = request('kegunaan_id');

    	$room->save();

    	return redirect('/rooms');
    }


    /**
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        /**
         * Model::find($id) adalah sama seperti memanggil Room::where('id', $id)->first();
         * ->first() ini bertujuan mendapatkan rekod pertama pada query yang dijalankan.
         */
        $room = Room::find($id);

        return view('rooms.show', compact('room'));
    }

    /**
     * paparkan borang edit rekod
     *
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
     */
    public function update($id)
    {

        // untuk update, perlu mendapatkan rekod yang hendak diedit
        $room = Room::find($id);

        // update field terlibat dengan value baru
        $room->name = request('name');
        $room->level = request('level');

        //jangan lupa save
        $room->save();

        return redirect('/rooms');
    }

    public function destroy($id)
    {
        $room = Room::find($id);

        //delete rekod room
        $room->delete();
        
        return redirect('/rooms');
    }

    /**
    * Hard Delete record
    */
    public function hardDelete($id) {
        /**
         * dapatkan maklumat room yang hendak kita delete
         *  oleh kerana Room menggunakan softdelete, kita perlu menggunakan withTrashed() untuk
         *  membolehkan query mencapai rekod yang telah di-delete
         */
        $room = Room::withTrashed()->find(5);
        $room->forceDelete();
        return redirect('/rooms');
    }

    /**
     * berikut adalah contoh menggunakan raw SQL statement untuk mendapatkan data.
     */
    public function getAllByRawQuery() {
        $rooms = DB::select("SELECT * FROM rooms");

        /**
         *  untuk data jenis array,
         *   laravel akan automatically tukar value kedalam bentuk json
         */
        return $rooms;
    }


    
}
