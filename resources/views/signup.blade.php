<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | PureBeauty</title>
</head>

<body>
    <h1>PureBeauty</h1>
    <p>Sign up to see our products!</p>

    <form action="{{ url('/signup') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <button type="submit">Sign Up</button>
    </form>
    <br>
    <p>Have an account? <a href="{{ url('/login') }}">Log in</a></p>
</body>

</html>