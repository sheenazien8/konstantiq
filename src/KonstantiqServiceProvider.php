<?php

namespace Sheenazien8\Konstantiq;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Sheenazien8\Konstantiq\Commands\KonstantiqCommand;

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
