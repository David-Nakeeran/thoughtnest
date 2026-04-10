<div x-cloak x-data="{ showModal: false }" @keydown.escape ="showModal=false">

    <button type="button" @click="showModal = true"
        class="px-4 py-2 bg-[#5B6CFF] text-white text-sm font-medium rounded-xl hover:opacity-90 transition">
        {{ $type }}
    </button>

    <div class="fixed inset-0 z-30 flex items-center justify-center bg-black/40 backdrop-blur-sm" x-show="showModal">

        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg border border-[#E5E7EB] p-6 space-y-4"
            @click.away="showModal = false" x-show="showModal">

            <div class="flex items-center justify-between">
                <h5 class="text-lg font-semibold">{{ $type }}</h5>

                <button @click="showModal = false" class="text-[#6B7280] hover:text-[#1F2937] transition">
                    ✕
                </button>
            </div>

            <x-journal-form :update="$update" :journal="$journal" />

        </div>
    </div>

</div>
