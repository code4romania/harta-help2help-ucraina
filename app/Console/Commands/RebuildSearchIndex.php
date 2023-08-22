<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Ngo;
use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Traits\Localizable;

class RebuildSearchIndex extends Command
{
    use Localizable;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:rebuild';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuilds the search index for all models';

    protected $models = [
        Ngo::class,
        Service::class,
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        app('languages')
            ->keys()
            ->crossJoin($this->models)
            ->each(function ($args) {
                [$locale, $model] = $args;

                $this->withLocale($locale, function () use ($model) {
                    $this->call('scout:flush', ['model' => $model]);
                    $this->call('scout:import', ['model' => $model]);
                });
            });

        return self::SUCCESS;
    }
}
