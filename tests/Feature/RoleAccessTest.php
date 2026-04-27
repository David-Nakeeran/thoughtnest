<?php

use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->admin()->create();
    $this->therapist = User::factory()->therapist()->create();
    $this->user = User::factory()->user()->create();
});

it('admin cannot access therapist dashboard', function () {
    login($this->admin)
        ->get("/dashboard/therapist")
        ->assertStatus(403);
});

it('therapist cannot access admin dashboard', function () {
    login($this->therapist)
        ->get('/dashboard/admin')
        ->assertStatus(403);
});

it('user cannot access admin dashboard', function () {
    login($this->user)
        ->get('/dashboard/admin')
        ->assertStatus(403);
});

it('guest is redirected to login', function () {
    $this->get('/dashboard/admin')
        ->assertRedirect('/login');
});
