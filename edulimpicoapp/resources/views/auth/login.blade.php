<x-layout>
    <h2>Login</h2>
    <form action="" method="post">
        @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Log in</button>
    </form>
</x-layout>