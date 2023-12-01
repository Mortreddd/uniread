<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset Verification</title>
</head>
<body>
    <p>Dear {{ $author->fullname }},</p>

    <p>We've received a request to reset your password for your account with {{ $appName }}.</p>

    <p>To proceed with the password reset, please click the following link:</p>
{{-- TODO modify the link --}}
    <p><a href="/profile/reset-password/{{$author->id}}/{{$token}}">{{ route('reset.password', ['id' => $author->id, 'token' => $token]) }}</a></p>

    <p>If you did not request a password reset, please ignore this email.</p>

    <p>Thank you,</p>

    <p>{{ $appName }} Team</p>
</body>
</html>
