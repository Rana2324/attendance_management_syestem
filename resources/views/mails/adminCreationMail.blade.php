<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Our Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .credentials {
            background-color: #f9f9f9;
            padding: 10px;
            border-left: 4px solid #007bff;
            border-radius: 5px;
        }

        .credentials p {
            margin: 0;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome, {{ $institutionAdmin->name }}</h1>
        </div>
        <div class="content">
            <p>Your account has been successfully created on our platform.</p>
            <p>We’re excited to have you on board! Below are your login credentials:</p>
            <div class="credentials">
                <p>Email: {{ $institutionAdmin->email }}</p>
                <p>Password: {{ $password }}</p>
            </div>
            <p>Please keep this information safe and secure. You can change your password after your first login.</p>
        </div>
        <div class="footer">
            <p>Thank you for joining us!</p>
            <p>&copy; 2024 Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
