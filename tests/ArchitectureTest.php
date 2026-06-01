<?php

test('app does not use debugging functions')
    ->expect(['dd', 'dump', 'var_dump', 'ray'])
    ->not->toBeUsed();

test('controllers do not interact with database directly')
    ->expect('App\\Http\\Controllers')
    ->not->toUse('Illuminate\\Support\\Facades\\DB');
