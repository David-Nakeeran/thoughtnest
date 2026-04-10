<x-layout>

    <section class="space-y-6">

        <div>
            <h1 class="text-2xl font-semibold">Admin Dashboard</h1>
            <p class="text-sm text-[#6B7280]">
                Manage therapists and user assignments.
            </p>
        </div>

        <div class="grid gap-4 md:grid-cols-2">

            <a href="/register-therapist"
                class="bg-white p-6 rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-md transition space-y-2">
                <h2 class="font-semibold">Add Therapist</h2>
                <p class="text-sm text-[#6B7280]">Register a new therapist account</p>
            </a>

            <a href="/therapist-assignments"
                class="bg-white p-6 rounded-2xl border border-[#E5E7EB] shadow-sm hover:shadow-md transition space-y-2">
                <h2 class="font-semibold">Assign Therapist</h2>
                <p class="text-sm text-[#6B7280]">Connect users with therapists</p>
            </a>

        </div>

    </section>

</x-layout>
