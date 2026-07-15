<x-layout>
    <section class="min-h-[65vh] flex items-start justify-center pt-16">
        <div class="max-w-xl space-y-6">
            <h1 class="font-display text-5xl font-normal leading-tight text-primary">
                A quiet space, just for you.
            </h1>
            <p class="text-base text-muted leading-relaxed max-w-md">
                You've been given access to <span class="text-primary-accent font-bold">ThoughtNest</span> as part of
                your care.
                This is your private space to
                write,
                reflect and stay connected to your therapist while you wait.
            </p>
            <div class="flex flex-wrap gap-3 pt-2">
                <a href="/register"
                    class="bg-primary-accent text-white text-sm px-6 py-2.5 rounded-lg hover:opacity-90 transition">
                    Create your account
                </a>
                <a href="/login"
                    class="text-sm px-6 py-2.5 rounded-lg border border-border text-muted hover:text-primary hover:border-primary-accent transition">
                    Already have one? Sign in
                </a>
            </div>
        </div>
    </section>
    <div class="h-px bg-border"></div>
    <section class="py-8 space-y-8">
        <p class="text-xs uppercase tracking-widest text-muted font-bold underline underline-offset-8">What you can do
            here</p>
        <div class="grid md:grid-cols-3 gap-px bg-border">
            <div class="bg-background py-6 md:pr-8 px-8 space-y-2">
                <div class="w-2 h-2 rounded-full bg-primary-accent"></div>
                <h3 class="text-sm font-medium text-primary">Write freely</h3>
                <p class="text-sm text-muted leading-relaxed">
                    Your private journal. Write as much or as little as you like, whenever you need to.
                </p>
            </div>
            <div class="bg-background py-6 px-8 space-y-2">
                <div class="w-2 h-2 rounded-full bg-primary-accent"></div>
                <h3 class="text-sm font-medium text-primary">Track your week</h3>
                <p class="text-sm text-muted leading-relaxed">
                    A simple weekly check-in for mood, anxiety and stress so you can notice patterns over time.
                </p>
            </div>
            <div class="bg-background py-6 pl-8 space-y-2">
                <div class="w-2 h-2 rounded-full bg-primary-accent"></div>
                <h3 class="text-sm font-medium text-primary">Hear from your therapist</h3>
                <p class="text-sm text-muted leading-relaxed">
                    Your therapist can leave comments on your journal so you're never just waiting.
                </p>
            </div>
        </div>
    </section>
    <p class="text-xs text-muted pb-8">
        Your entries are private. Only your assigned therapist can see them.
    </p>
</x-layout>
