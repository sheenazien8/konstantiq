<?php

namespace Sheenazien8\Konstantiq;

use Illuminate\Support\Collection;

interface ConstantInterface
{
    public static function all(): Collection;

    public static function getTitle(string $name): string;

    public static function getValues(): array;
}


