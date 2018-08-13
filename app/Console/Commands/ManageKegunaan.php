<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Kegunaan;

class ManageKegunaan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kegunaan:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk menambah rekod table kegunaan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**
         * untuk memaparkan maklumat didalam bentuk table
         * 2 array diperlukan
         *   1) array yang mengandungi senarai column ($header)
         *   2) array yang mengandungi senarai rekod yang akan dipaparkan ($kegunaan)
         */
        $header = ['Name', 'Tarikh Rekod Dicipta'];
        $kegunaan = Kegunaan::get(['name','created_at'])
            ->toArray()
            ;

        //paparkan table
        $this->table($header, $kegunaan);

        //Ini akan meminta pengguna memberi input dan input ini
        //  akan dimasukkan ke dalam $name
        $name = $this->ask("Masukkan nama kegunaan:");

        if(empty($name)) {
            //paparkan error pada terminal
            $this->error("Tiada Maklumat Nama Bilik Baru diberi");

        } else {
            //didalam command artisan dapat menggunakan Model sebagaimana
            // membina aplikasi biasa laravel.
            Kegunaan::create([ 'name' => $name  ]);

            //display senarai kegunaan baru    
            $kegunaan = Kegunaan::get(['name','created_at'])
                    ->toArray()
                ;

            $this->table($header, $kegunaan);

            //memaparkan kepada pengguna prosess selesai pada terminal
            $this->info("Maklumat berjaya dimasukkan. TQ...");
        }
        
    }
}
