<x-layout>
    <h2>Welcome back {{ $user['name'] }}</h2>
    <x-journal-modal type="Add new journal entry" />
    <a href="/journals">View All Journals</a>
</x-layout>
