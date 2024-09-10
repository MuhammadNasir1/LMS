<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Email</title>
    <style>
        body {
            font-family: "Helvetica Neue", Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #007bff;
            color: #ffffff;
            border-radius: 12px 12px 0 0;
        }

        .header h1 {
            font-size: 28px;
            margin: 0;
        }

        .content {
            padding: 20px;
            color: #333333;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin: 15px 0;
        }

        .login-card {
            background-color: #f7faff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            margin: 20px 0;
            text-align: center;
        }

        .login-card h2 {
            font-size: 22px;
            color: #333333;
            margin-bottom: 15px;
        }

        .info-field {
            font-size: 16px;
            margin: 10px 0;
            color: #555555;
            text-align: left;
        }

        .info-field strong {
            color: #007bff;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #7a7a7a;
        }

        .footer p {
            margin: 5px 0;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .email-container {
                padding: 20px;
            }

            .header h1 {
                font-size: 22px;
            }

            .content p {
                font-size: 14px;
            }

            .login-card {
                padding: 15px;
            }

            .login-card h2 {
                font-size: 20px;
            }

            .info-field {
                font-size: 14px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }

            .footer {
                font-size: 12px;
            }
        }

        @media (max-width: 400px) {
            .header h1 {
                font-size: 20px;
            }

            .content p {
                font-size: 13px;
            }

            .btn {
                padding: 8px 16px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Welcome to Enlightening Edu</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>
                We are excited to have you on board! Use the credentials below to log
                in to your account:
            </p>

            <div class="login-card">
                <h2>Your Login Details</h2>
                <p class="info-field"><strong>Email:</strong> {{ $email }}</p>
                <p class="info-field"><strong>Password:</strong> {{ $Mpassword }}</p>
                <a href="https://e-learning.enlighteningedu.com/login" class="btn">Log in</a>
            </div>

            <p>If this wasn't you, feel free to disregard this email.</p>
        </div>

        <div class="footer">
            <p>&copy; 2024 EnlighteningEdu. All rights reserved.</p>
            <p>Contact us: support@enlighteningedu.com</p>
        </div>
    </div>
</body>

</html>
