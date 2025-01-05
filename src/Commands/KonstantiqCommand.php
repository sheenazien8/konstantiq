<?php

namespace Sheenazien8\Konstantiq\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class KonstantiqCommand extends Command
{
    public $signature = 'make:constant {name?}';

    public $description = 'Generate a constant class';

    public function handle(): int
    {
        $name = $this->argument('name');

        if (!$name) {
            $name = $this->ask('What is the name of the constant class?');
        }

        $stub = $this->getStub();
        $content = str_replace('{{ ClassName }}', $name, File::get($stub));
        $content = str_replace('{{ namespace }}', 'App\Constants', $content);

        $path = app_path("Constants/{$name}.php");

        if (!File::exists(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

        File::put($path, $content);

        $this->info("Constant class {$name} created successfully.");

        return self::SUCCESS;
    }

    protected function getStub(): string
    {
        return __DIR__ . '/../../stubs/constant.stub';
    }
}

