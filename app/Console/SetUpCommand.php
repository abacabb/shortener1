<?php

namespace App\Console;


use Illuminate\Console\Command;

class SetUpCommand extends Command
{
    protected $signature = 'setup';
    protected $description = 'Set up sqlite db';

    public function handle()
    {
        if (config('database.default') === 'sqlite') {
            $path = config('database.connections.sqlite.database');
            if (!file_exists($path) && is_dir(dirname($path))) {
                touch($path);
            }
        }
    }
}