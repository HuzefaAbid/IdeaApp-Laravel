<?php

use Illuminate\Support\Facades\Auth;

test('it registers a user', function () {
    visit("/register")
        ->fill('name', 'John Doe')
        ->fill('email', 'test@example.com')
        ->fill('password', 'Exampletest1122@')
        ->click('@register-btn')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => 'John Doe',
        'email' => 'test@example.com',
    ]);
});
