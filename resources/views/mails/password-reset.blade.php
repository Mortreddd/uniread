<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset Confirmation</title>
</head>
<body>
    <p>Hello {{ $author->fullname }},</p>

    <p>We received a request to reset your password. To reset your password, please use the following token:</p>

    <p><strong>{{ $token }}</strong></p>

    <p>If you did not request a password reset, please disregard this email.</p>

    <p>Thank you,</p>
    <p>{{ $appName }} Team</p>
</body>
</html>
