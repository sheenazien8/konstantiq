<?php

namespace Sheenazien8\Konstantiq;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;

abstract class ConstanstAbstraction implements ConstantInterface
{
    public static function all(): Collection
    {
        $constants = collect((new ReflectionClass(static::class))->getConstants());
        $values = collect();
        $constants->each(
            static function ($constant, $index) use ($values) {
                $values->put($constant, Str::title(str_replace('_', ' ', $index)));
            }
        );

        return $values;
    }

    public static function getTitle(string $name): string
    {
        $constants = static::all()->toArray();

        return $constants[$name];
    }

    public static function getValues(): array
    {
        $constants = collect((new ReflectionClass(static::class))->getConstants());
        $values = collect();
        $constants->each(
            static function ($constant, $index) use ($values) {
                $values->put($index, $constant);
            }
        );

        return $values->toArray();
    }
}
