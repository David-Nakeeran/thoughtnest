<div x-cloak x-data="{ showModal: false }" @keydown.escape ="showModal=false">

    <button type="button" @click="showModal = true" class="text-xs text-[#EF4444] hover:underline">
        {{ $title }}
    </button>

    <div class="fixed inset-0 z-40 flex items-center justify-center bg-black/40 backdrop-blur-sm" x-show="showModal">

        <div class="w-full max-w-md bg-white rounded-2xl border border-[#E5E7EB] shadow-lg p-6 space-y-4"
            @click.away="showModal = false" x-show="showModal">

            <h5 class="text-lg font-semibold">
                {{ $message }}
            </h5>

            <div class="flex justify-end gap-3">

                <button type="button" @click="showModal = false"
                    class="px-4 py-2 text-sm rounded-xl border border-[#E5E7EB] hover:bg-[#F9FAFB]">
                    Cancel
                </button>

                <form method="POST" action="{{ $actionRoute }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="px-4 py-2 bg-[#EF4444] text-white text-sm rounded-xl hover:opacity-90">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    </div>

</div>
