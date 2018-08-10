<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
     use SoftDeletes;
    //
     protected $table = 'rooms';

     //supaya Laravel kenal ini field date 
          //membolehkan Laravel tambah fungsi2 berkaitan date
          //pada field ini.
     protected $dates = ['deleted_at'];

     //whitelist. hanya menerima value field name sahaja
     //protected $fillable = ['name'];

     //blacklist. tidak menerima field id
     protected $guarded = ['id'];


     // const CREATED_AT = 'tarikh_rekod_dijana';
     // const UPDATED_AT = 'tarikh_rekod_last_update';

     //Define Relationship
     public function user() {
     	//foreign key namamodel_id, id di table yang dirujuk
     	return $this->belongsTo('App\User');
     }

     public function kegunaan() {
     	//foreign key namamodel_id, id di table yang dirujuk
     	return $this->belongsTo('App\Kegunaan');
     }

     //Query scope
     //nama function bermula dengan 'scope'
     public function scopeIsTrainingOnLevel2($query) {
          //where kegunaan_id = 1 bermaksud jenis Training
          return $query->where('kegunaan_id', 1)
                    ->where('level', '2')
          ;
     }

}