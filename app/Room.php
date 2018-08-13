<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
     use SoftDeletes;

     /**
      * jika menggunakan nama table yang selain yang dicari oleh laravel,
      * boleh memberitahu laravel table mana yang perlu dirujuk
     */
     protected $table = 'rooms';

     /**
      * supaya Laravel kenal ini field date
      * membolehkan Laravel tambah fungsi2 berkaitan date
      * pada field ini. contohnya $this->created_at->format('d, M Y')
      * yang akan memaparkan tarikh mengikut format diatas
    */
     protected $dates = ['deleted_at'];

     //whitelist. hanya menerima value field tersenarai sahaja
     //protected $fillable = ['name','level'];

     //blacklist. tidak menerima field tersenarai.
     protected $guarded = ['id', 'created_at'];


    /**
     * uncomment kod dibawah ini untuk nama
     * field yang menyimpan tarikh rekod dibuat/bila terakhir diupdate
     * adalah berbeza dengan yang laravel sarankan...
     */
     // const CREATED_AT = 'tarikh_rekod_dijana';
     // const UPDATED_AT = 'tarikh_rekod_last_update';

     /**
      * Define Relationship
      */
      /**
       *  bila maklumat dicapai, maklumat user boleh dicapai secara berikut:
       *    if( !empty($room->user) ) {
       *     echo $room->user->name;
       *    }
       *
       *  perlu dipastikan $room->user tidak null supaya php tidak mengeluarkan
       *  syntax error.
      */
     public function user() {
     	//foreign key namamodel_id, id di table yang dirujuk
     	return $this->belongsTo('App\User');
     }

     public function kegunaan() {
     	//foreign key namamodel_id, id di table yang dirujuk
     	return $this->belongsTo('App\Kegunaan');
     }


     /**
      * Query scope adalah untuk sekalikan beberapa condition query
      *  yang kerap diguna.
      *  selain mengurangkan tempat yang perlu diedit jika ada perubahan,
      *   ia juga memudahkan memahami kod apabila dibaca sepintas lalu
      *
      *  cara digunakan nanti ialah buang 'scope', huruf pertama selepas 'scope'
      *  ditukar jadi huruf kecil. untuk kes dibawah, ianya akan dipanggil seperti berikut:
      *  Room::where('field1', $value)
      *     ->isTrainingOnLevel2()
      *     ->get()
     */
     public function scopeIsTrainingOnLevel2($query) {
          //where kegunaan_id = 1 bermaksud jenis Training
          return $query->where('kegunaan_id', 1)
                    ->where('level', '2')
          ;
     }

}