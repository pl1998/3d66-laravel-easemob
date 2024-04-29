<?php

declare(strict_types=1);


namespace Tepeng\LaravelEasemob\Api\Commands;

use Illuminate\Console\Command;

class AppTokenClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'easemob:token:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle(): void
    {
        $file = dirname(__DIR__).'/app_token.cache';
        file_exists($file) && unlink($file);
        $this->info('Token cleared');
    }
}
