<?php

namespace App\Console\Commands;
use App\Gateway;
use Illuminate\Console\Command;

class AddGateway extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gateway:add {name} {gateway}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new SMS gateway to database.';

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
        //
        //
        Gateway::Create([
          'name' => $this->argument('name'),
          'gateway' => $this->argument('gateway'),
          ]);
          $this->info('SMS Gateway ADDED!');
    }
}
