<?php

use App\Models\User;

test('it logs in a user', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => 'Exampletest1122@',
    ]);

    visit('/login')
        ->fill('email', 'test@example.com')
        ->fill('password', 'Exampletest1122@')
        ->click('@login-btn')
        ->assertPathIs('/');

    $this->assertAuthenticated();
});
