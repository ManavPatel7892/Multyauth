<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Project</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 20px;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Project!</h1>
        <p>Dear {{ $user->name }},</p>
        <p>We are thrilled to have you as a part of our project. Your journey with us is just beginning, and we're excited to embark on this adventure together.</p>
        <p>Here are a few things you can do to get started:</p>
        <ul>
            <li>Explore our website and discover the amazing features we offer.</li>
            <li>Connect with fellow members in our forums or social media groups.</li>
        </ul>
        <p>Once again, welcome aboard!</p>
        <p>Best regards,Work24 Team</p>
    </div>
</body>
</html>
