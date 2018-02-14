<?php namespace Bantenprov\JPTingkatPendidikan\Console\Commands;

use Illuminate\Console\Command;

/**
 * The JPTingkatPendidikanCommand class.
 *
 * @package Bantenprov\JPTingkatPendidikan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPTingkatPendidikanCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:jumlah-penduduk-tingkat-pendidikan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\JPTingkatPendidikan package';

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
        $this->info('Welcome to command for Bantenprov\JPTingkatPendidikan package');
    }
}
