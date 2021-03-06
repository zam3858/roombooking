<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Kegunaan;

class ProsesKegunaan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kegunaan:proses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Memproses Setiap Rekod Kegunaan';

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
        //akan menulis mesej ini ke dalam log file
        Log::info("Prosess kegunaan bermula");

        //progress bar dia buat di sini.
        $bar = $this->output->createProgressBar(100);

        $current_count = 0;
        while ( $current_count <= 100) {
            //memberitahu progress bar terdapat progress
            $bar->advance();
            $current_count += 10;

        }

        //memberitahu progress bar sudah selesai sepenuhnya
        $bar->finish();

        //memaparkan kepada pengguna prosess selesai pada terminal
        $this->info("Processing done!");

        Log::info("Selesai");
    }
}
