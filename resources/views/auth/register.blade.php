<x-layout>
    <section class="min-h-[70vh] flex items-center justify-center px-4">
        <div class="w-full max-w-md space-y-8">
            <div class="space-y-3">
                <h1 class="font-display text-3xl text-primary">
                    Create your account
                </h1>
            </div>
            <form method="POST" action="{{ $action }}" class="space-y-5">
                @csrf
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-primary">
                        Name
                    </label>
                    <input type="text" name="name" required value="{{ old('name') }}"
                        class="w-full bg-surface border border-border rounded-lg px-4 py-3 text-sm text-primary focus:outline-none focus:border-primary-accent transition" />
                    <x-form-error field="name" />
                </div>
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-primary">
                        Email
                    </label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                        class="w-full bg-surface border border-border rounded-lg px-4 py-3 text-sm text-primary focus:outline-none focus:border-primary-accent transition" />
                    <x-form-error field="email" />
                </div>
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-primary">
                        Password
                    </label>
                    <input type="password" name="password" required
                        class="w-full bg-surface border border-border rounded-lg px-4 py-3 text-sm text-primary focus:outline-none focus:border-primary-accent transition" />
                    <x-form-error field="password" />
                </div>
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-primary">
                        Confirm password
                    </label>
                    <input type="password" name="password_confirmation" required
                        class="w-full bg-surface border border-border rounded-lg px-4 py-3 text-sm text-primary focus:outline-none focus:border-primary-accent transition" />
                    <x-form-error field="password_confirmation" />
                </div>
                <button type="submit"
                    class="w-full bg-primary-accent text-white py-3 rounded-lg text-sm font-medium hover:opacity-90 transition">
                    Create account
                </button>
            </form>
            <p class="text-sm text-muted">
                Already have an account?
                <a href="/login" class="text-primary-accent hover:underline">
                    Sign in
                </a>
            </p>
        </div>
    </section>
</x-layout>
