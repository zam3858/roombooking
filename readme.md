<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

### Training 6-10 August 2018, MAMPU

## Rujukan
 
 * [Document Laravel](https://laravel.com/docs/5.6)
 * [Tutorial Asas PHP (laracasts)](https://laracasts.com/series/php-for-beginners)
 * [Tutorial Asas Laravel (laracasts)](https://laracasts.com/series/laravel-from-scratch-2017)
 * [PHP The Right Way](https://www.phptherightway.com/)
 
 * [ Adminlte free boostrap template] (https://adminlte.io)


## Nota laravel
Setelah mendapatkan laravel (samada menggunakan laragon 
atau download dari website Laravel), perlu edit .env file pada 
folder aplikasi laravel. 

Ini untuk memasukkan maklumat nama aplikasi, DB dan lain-lain. 

Setelah Untuk setup laravel asas, biasanya perlu run command:
    
    php artisan key:generate
    php artisan make:auth
    php artisan migrate
    

Command artisan make:auth adalah untuk bina asas login mudah yang boleh 
digunakan sebagai asas aplikasi.

## Membina table pertama
Untuk membina table, kaedah disarankan ialah menggunakan migration iaitu dengan 
menjalankan command artisan berikut

    php artisan make:migration create_new_table_namatable --create=namatable
    
Ini akan membina file migration apa folder database/migrations/

Edit file migration yang baru dibina itu untuk tambahkan apa-apa field yang diperlukan untuk table itu.

## Model
Model mengawal keluar-masuk data dari database (tapi sebenarnya ia boleh
merujuk kepada file dan lain2).

Untuk membina model, boleh jalankan command artisan dibawah:

    php artisan make:model NamaModel 
    
Beberapa nota dalam training dimasukkan ke dalam model Room (app/Room.php)
sebagai comment sebagai rujukan

## Controller
Controller bertujuan mengawal flow aplikasi yang dibina.

Untuk membina controller, command artisan terlibat adalah:

    php artisan make:controller NamaController
    //ATAU 
    php artisan make:controller NamaController --resource

dengan menggunakan opsyen --resouce, ia akan menjanakan sekali resource
functions (index,create, store, edit, update, delete) dalam controller terjana.

Beberapa nota training juga dimasukkan ke dalam file controller RoomController 
(app/Http/Controllers/RoomController.php)

## View
View digunakan untuk tujuan paparan. Laravel menggunakan template enjin
Blade. View berada dalam folder resources/views/. Kebiasaannya nama folder
dalam folder resources/views/ ini adalah mengikut plural nama controller (RoomController akan memanggil
resources/views/rooms) 

Boleh merujuk kepada file resources/views/layouts/cth.blade.php untuk beberapa
contoh.

## Route
Route membolehkan Laravel memanggil code terlibat berdasarkan request pengguna.

Dalam training ini, kita menggunakan routes/web.php untuk meletakkan
maklumat routing. Terdapat sedikit nota diisi di web.php sebagai rujukan

## Membina Command Artisan
Membina command artisan sangat berguna kerana penggunaannya meluas. Contohnya, ia boleh digunakan untuk menjalankan proses pada waktu tertentu menggunakan scheduler pada operating system.

Gunakan Artisan untuk membina rangka arahan artisan:

    php artisan make:command MenghantarEmail

File rangka artisan ini akan dijana app/Console/Commands/ 

app/Console/Commands/ManageKegunaan.php mengandungi contoh memaparkan
rekod dalam bentuk table, cara meminta input daripada user dan menggunakan
Model untuk sesuatu kegunaan.

app/Console/Commands/ProcessKegunaan.php menunjukkan cara memaparkan
progress bar

Ada masa artisan command ini hendak digunakan dalam aplikasi web, dipanggil dalam controller contohnya.

    //Dalam ManaManaController
    Artisan::call("kegunaan:proses");
