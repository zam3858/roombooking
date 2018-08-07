<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
     protected $table = 'rooms';

     //whitelist. hanya menerima value field name sahaja
     //protected $fillable = ['name'];

     //blacklist. tidak menerima field id
     protected $guarded = ['id','password'];


     // const CREATED_AT = 'tarikh_rekod_dijana';
     // const UPDATED_AT = 'tarikh_rekod_last_update';

}
