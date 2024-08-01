<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLUMS Admin Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6f3085, #ffca3a);

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .left-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(to right, #ffafbd, #ffc3a0);
        }
        .right-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 4rem;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .login-card h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #5a67d8;
            margin-bottom: 1.5rem;
        }
        .login-card form {
            display: flex;
            flex-direction: column;
        }
        .login-card label {
            font-size: 1.2rem;
            color: #333333;
            margin-bottom: 0.5rem;
        }
        .login-card input[type="email"],
        .login-card input[type="password"] {
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        .login-card button {
            padding: 1rem;
            background-color: #5a67d8;
            color: #ffffff;
            font-size: 1.2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-card button:hover {
            background-color: #4c56a7;
        }
        .login-card .forgot-password {
            font-size: 1rem;
            text-align: center;
            margin-top: 1rem;
            color: #999999;
        }
        .login-card .forgot-password a {
            color: #5a67d8;
            text-decoration: none;
        }
        .left-panel-content {
            max-width: 400px;
            text-align: center;
            color: #ffffff;
        }
        .left-panel-content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .left-panel-content p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="left-panel">
        <div class="left-panel-content">
            <h1>Welcome to PLUMS</h1>
            <p>Manage your quizzes and courses efficiently with the PLUMS admin dashboard. </p>
            <p>Please log in to continue.</p>

        </div>
    </div>
    <div class="right-panel">
        <div class="login-card">
            <h2>Login</h2>
            <form>
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
                <p class="forgot-password"><a href="#">Forgot password?</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
