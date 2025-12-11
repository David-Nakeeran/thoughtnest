<x-layout>
    <form method="POST" action="/register" class="flex flex-col">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        <x-form-error field="name" />
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <x-form-error field="email" />
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <x-form-error field="password" />
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <x-form-error field="password_confirmation" />
        <button type="submit">Register</button>
    </form>
</x-layout>
