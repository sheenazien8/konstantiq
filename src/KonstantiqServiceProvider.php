<?php

namespace Sheenazien8\Konstantiq;

use Sheenazien8\Konstantiq\Commands\KonstantiqCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class KonstantiqServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('konstantiq')
            ->hasConfigFile()
            ->hasCommand(KonstantiqCommand::class);
    }
}
