<?php

use App\Models\Journal;
use App\Models\TherapistAssignment;
use App\Models\User;

beforeEach(function () {
    $this->therapist = User::factory()->therapist()->create();
    $this->assignedUser = User::factory()->user()->create();
    $this->unassignedUser = User::factory()->user()->create();
    TherapistAssignment::create([
        'therapist_id' => $this->therapist->id,
        'user_id' => $this->assignedUser->id
    ]);
    $this->journal = Journal::factory()->create(['user_id' => $this->assignedUser->id]);
});

it('assigned therapist can view users journals', function () {
    login($this->therapist)
        ->get("/therapist/users/{$this->assignedUser->id}/journals")
        ->assertStatus(200);
});

it('unassigned therapist cannot view users journals', function () {
    login($this->therapist)
        ->get("/therapist/users/{$this->unassignedUser->id}/journals")
        ->assertStatus(403);
});
