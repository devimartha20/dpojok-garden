<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .logo {
            width: 100px;
            margin-bottom: 20px;
        }
        h1 {
            color: #00796b;
            font-size: 26px;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 14px 28px;
            margin: 10px 0;
            font-size: 16px;
            color: #ffffff;
            background-color: #00796b;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #004d40;
        }
        .link {
            display: block;
            margin-top: 20px;
            color: #00796b;
            text-decoration: none;
            font-size: 14px;
        }
        .link:hover {
            text-decoration: underline;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><strong>D'PODJOK GARDEN</strong></h1>
        <h1>Email Verification</h1>
        <p>Thank you for signing up! To complete your registration, please verify your email address.</p>
        <p>We've sent an email to <strong>YourEmail@example.com</strong> with a verification link. Please check your inbox (including spam folder).</p>
        <a href="#" class="button">Resend Verification Email</a>
        <a href="#" class="link">Update Email Address</a>
    </div>
</body>
</html>
