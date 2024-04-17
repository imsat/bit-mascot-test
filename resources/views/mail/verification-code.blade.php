<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .code {
            font-size: 18px;
            text-align: center;
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #666666;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Bit Mascot</h2>
    </div>
    <div class="code">
        <p>To authenticate, please use the following One Time Password (OTP)</p>
        <p><strong>{{ $verificationCode }}</strong></p>
    </div>
    <div class="footer">
        <p>Don't share this OTP with anyone. We hope to see you again soon</p>
        <br>
        <br>
        <p>Regards</p>
        <p>Bit Mascot</p>
    </div>
</div>
</body>
</html>
