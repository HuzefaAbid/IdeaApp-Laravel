<?php

use App\Models\User;

test('it logs in a user', function () {
    visit('/login')
        ->fill('email', 'test@example.com')
        ->fill('password', 'Exampletest1122@')
        ->click('@login-btn')
        ->assertPathIs('/');

    $this->assertAuthenticated();
});
