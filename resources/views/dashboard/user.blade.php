<x-layout>

    <section class="space-y-6">

        <div>
            <h2 class="text-2xl font-semibold">
                Welcome back, {{ $user['name'] }}
            </h2>
            <p class="text-[#6B7280] text-sm">
                Take a moment to reflect or continue your journey.
            </p>
        </div>
        <div class="flex flex-wrap gap-4">

            <x-journal-modal type="Add new journal entry" />

            <a href="/journals"
                class="px-4 py-2 rounded-xl border border-[#E5E7EB] text-sm font-medium text-[#1F2937] hover:bg-[#F9FAFB] transition">
                View all journals
            </a>

        </div>

    </section>

</x-layout>
