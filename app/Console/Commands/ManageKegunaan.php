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
        $header = ['Name', 'Tarikh Rekod Dicipta'];
        $kegunaan = Kegunaan::get(['name','created_at'])
                ->toArray()
            ;

        $this->table($header, $kegunaan);

        $name = $this->ask("Masukkan nama kegunaan:");

        if(empty($name)) {

            $this->error("Tiada Maklumat Nama Bilik Baru diberi");

        } else {
            Kegunaan::create([ 'name' => $name  ]);

            //display senarai kegunaan baru    
            $kegunaan = Kegunaan::get(['name','created_at'])
                    ->toArray()
                ;

            $this->table($header, $kegunaan);

            $this->info("Maklumat berjaya dimasukkan. TQ...");
        }
        
    }
}
