<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Mail</title>
</head>
<body>
    <h3>Welcome to Weavers-web. Your account has been created successfull</h3>
    <p><strong>Email Id:</strong> {{ $mailEmail }}</p>
    <p><strong>Username:</strong> {{ $mailUsername }}</p>
    <p><strong>Password:</strong> {{ $mailPassword }}</p>
    <p>Please change your <strong>Password</strong> For scurity purpose.</p>
</body>
</html>