<?php

namespace Sil2\VfApi\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'vf-api:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Test API  widget package';

    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->initDatabase();

    }

    /**
     * Create tables and seed it.
     *
     * @return void
     */
    public function initDatabase()
    {
        $this->call('migrate');
        $this->call('db:seed', ['--class' => \Sil2\VfApi\Database\TablesSeeder::class]);
    }
}
