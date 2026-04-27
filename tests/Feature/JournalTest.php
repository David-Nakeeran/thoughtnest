<?php

use App\Models\Journal;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->user()->create();
    $this->otherUser = User::factory()->user()->create();
    $this->journal = Journal::factory()->create(['user_id' => $this->user->id]);
});

it('can store journal entry', function () {
    login($this->user)
        ->post("/journals", [
            'content' => fake()->text(600)
        ])
        ->assertRedirect('/dashboard/user')->assertSessionHas('success', 'Your journal entry has been created.');

    $this->assertDatabaseHas('journals', [
        'user_id' => $this->user->id
    ]);

    $journalEntry = Journal::latest()->first();

    expect($journalEntry->content)->toBeString()->not->toBeEmpty();
});

it('can update journal entry', function () {
    $newContent = fake()->text(600);

    login($this->user)
        ->patch("/journals/{$this->journal->id}", [
            'content' => $newContent
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('journals', [
        'id' => $this->journal->id,
        'content' => $newContent
    ]);
});

it('can delete journal entry', function () {
    login($this->user)
        ->delete("/journals/{$this->journal->id}")
        ->assertRedirect();

    $this->assertDatabaseMissing('journals', [
        'id' => $this->journal->id,
    ]);
});

it('cannot view another users journal', function () {
    login($this->otherUser)
        ->get("/journals/{$this->journal->id}")
        ->assertStatus(403);
});

it('cannot update another users journal', function () {
    login($this->otherUser)
        ->patch("/journals/{$this->journal->id}", [
            'content' => fake()->text(600)
        ])
        ->assertStatus(403);
});

it('cannot delete another users journal', function () {
    login($this->otherUser)
        ->delete("/journals/{$this->journal->id}")
        ->assertStatus(403);
});
