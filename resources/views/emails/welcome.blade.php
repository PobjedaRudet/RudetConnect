<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Thank you for joining our application.</p>
    <p>Please choose one of the following options:</p>
    <a href="{{ url('/accept') }}" style="padding: 10px 20px; background-color: green; color: white; text-decoration: none;">Accept</a>
    <a href="{{ url('/deny') }}" style="padding: 10px 20px; background-color: red; color: white; text-decoration: none;">Deny</a>
</body>
</html>
