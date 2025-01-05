<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

it('handles the command with argument', function () {
    $name = 'TestConstant';
    $path = app_path("Constants/{$name}.php");

    if (File::exists($path)) {
        File::delete($path);
    }

    Artisan::call('make:constant', ['name' => $name]);

    expect(File::exists($path))->toBeTrue();

    File::delete($path);
});

it('handles the command without argument', function () {
    $name = 'TestConstant';
    $path = app_path("Constants/{$name}.php");

    if (File::exists($path)) {
        File::delete($path);
    }

    $this->mockConsoleOutput = true;
    $this->artisan('make:constant')
        ->expectsQuestion('What is the name of the constant class?', $name)
        ->assertExitCode(0);

    expect(File::exists($path))->toBeTrue();

    File::delete($path);
});
