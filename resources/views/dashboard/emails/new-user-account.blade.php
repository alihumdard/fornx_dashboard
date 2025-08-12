<!-- resources/views/emails/new-user-account.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Our System</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            width: 100%;
            padding: 40px 0;
            background-color: #f4f6f9;
        }
        .email-content {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .email-header {
            background-color: #4f46e5;
            color: #ffffff;
            padding: 24px 32px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 32px;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.6;
        }
        .credentials {
            background-color: #f9f9f9;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 16px;
            margin: 20px 0;
        }
        .credentials p {
            margin: 0 0 8px 0;
            font-weight: bold;
        }
        .credentials span {
            font-weight: normal;
            color: #111827;
        }
        .email-footer {
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <h1>Welcome to Our System!</h1>
            </div>
            <div class="email-body">
                <p>Hi {{ $user->name ?? 'User' }},</p>
                <p>Your account has been successfully created. Please find your login credentials below:</p>

                <div class="credentials">
                    <p>Email: <span>{{ $user->email }}</span></p>
                    <p>Password: <span>{{ $password }}</span></p>
                </div>

                <p>We recommend logging in and updating your password immediately for security reasons.</p>

                <p>Thank you,<br><strong>The Admin Team</strong></p>
            </div>
            <div class="email-footer">
                &copy; {{ date('Y') }} Your Company. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>
