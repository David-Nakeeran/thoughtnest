<x-layout>
    <form method="POST" action="/login" class="flex flex-col">
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <button type="submit">Login</button>
    </form>
</x-layout>
