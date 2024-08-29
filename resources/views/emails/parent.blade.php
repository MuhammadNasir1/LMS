<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 10px;
        }

        .email-header {
            text-align: center;
            padding-bottom: 20px;
        }

        .email-header img {
            max-width: 150px;
        }

        .email-body {
            font-size: 16px;
            line-height: 1.6;
            color: #333333;
            padding: 20px;
        }

        .credentials-box {
            background-color: #f9f9f9;
            border: 1px solid #dddddd;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .credentials-box p {
            margin: 0;
            font-weight: bold;
        }

        .credentials-box span {
            color: #007bff;
        }

        .email-footer {
            text-align: center;
            font-size: 12px;
            color: #999999;
            padding-top: 20px;
        }

        .button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .email-container {
                padding: 10px;
            }

            .credentials-box {
                padding: 10px;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <img src="logo.png" alt="Company Logo">
        </div>
        <div class="email-body">
            <h2>Hello [User Name],</h2>
            <p>Thank you for signing up! Here are your login credentials:</p>

            <div class="credentials-box">
                <p>Email: <span>{{ $email }}</span></p>
                <p>Password: <span>{{ $Mpassword }}</span></p>
            </div>

            <p>Please keep your credentials safe and do not share them with anyone.</p>
            <a href="[login_url]" class="button">Login to Your Account</a>
        </div>
        <div class="email-footer">
            <p>If you didn’t request this email, please ignore it.</p>
            <p>&copy; 2024 Enlighteningedu. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
