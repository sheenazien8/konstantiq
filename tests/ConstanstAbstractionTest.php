<?php

use Illuminate\Support\Collection;
use Sheenazien8\Konstantiq\ConstanstAbstraction;

it('tests all', function () {
    $mockClass = new class extends ConstanstAbstraction {
        const PENDING = 'pending';
        const DONE = 'done';
    };

    $expected = new Collection([
        'pending' => 'Pending',
        'done' => 'Done',
    ]);

    expect($mockClass::all())->toEqual($expected);
});

it('tests getTitle', function () {
    $mockClass = new class extends ConstanstAbstraction {
        const PENDING = 'pending';
        const DONE = 'done';
    };

    expect($mockClass::getTitle('pending'))->toEqual('Pending');
    expect($mockClass::getTitle('done'))->toEqual('Done');
});

it('tests getValues', function () {
    $mockClass = new class extends ConstanstAbstraction {
        const PENDING = 'pending';
        const DONE = 'done';
    };

    $expected = [
        'PENDING' => 'pending',
        'DONE' => 'done',
    ];

    expect($mockClass::getValues())->toEqual($expected);
});

