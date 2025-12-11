<x-layout>
    <form method="POST" action="/login" class="flex flex-col">
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <x-form-error field="email" />
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <x-form-error field="password" />
        <button type="submit">Login</button>
    </form>
</x-layout>
