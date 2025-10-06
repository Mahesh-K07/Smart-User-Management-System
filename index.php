<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
        }
        .container {
            text-align: center;
            background: rgba(0,0,0,0.6);
            padding: 50px 40px;
            border-radius: 12px;
        }
        a {
            text-decoration: none;
            color: #fff;
            background-color: #ff7e5f;
            padding: 12px 25px;
            margin: 0 10px;
            border-radius: 6px;
            font-weight: bold;
        }
        a:hover {
            background-color: #feb47b;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to the Project</h2>
        <p>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        </p>
    </div>
</body>
</html>
