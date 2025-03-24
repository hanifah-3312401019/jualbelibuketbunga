<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to the site | PureBeauty</title>
</head>

<body>
    <h1>PureBeauty</h1>
    <p>Login to see our products!</p>

    <!-- Form login -->
    <form method="POST" action="/login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <div id="success-message" style="display: none;">Welcome to PUREBEAUTY!</div>
    <div id="error-message" style="display: none;">Username atau password salah</div>

    <p>New here? <a href="{{ url('/signup') }}">signup</a></p>
</body>

</html>