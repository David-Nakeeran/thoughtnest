<x-layout>

    <section class="flex items-center justify-center min-h-[70vh]">

        <div class="w-full max-w-md bg-white p-8 rounded-2xl border border-[#E5E7EB] shadow-sm space-y-6">

            <div class="text-center space-y-2">
                <h1 class="text-2xl font-semibold">Welcome back</h1>
                <p class="text-sm text-[#6B7280]">Log in to continue your journey</p>
            </div>

            <form method="POST" action="/login" class="space-y-4">
                @csrf

                <div class="space-y-1">
                    <label for="email" class="text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full rounded-xl border border-[#E5E7EB] px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#5B6CFF]/30 focus:border-[#5B6CFF]" />
                    <x-form-error field="email" />
                </div>

                <div class="space-y-1">
                    <label for="password" class="text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full rounded-xl border border-[#E5E7EB] px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#5B6CFF]/30 focus:border-[#5B6CFF]" />
                    <x-form-error field="password" />
                </div>

                <button type="submit"
                    class="w-full bg-[#5B6CFF] text-white py-2 rounded-xl text-sm font-medium hover:opacity-90 transition">
                    Login
                </button>

            </form>

        </div>

    </section>

</x-layout>
