<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-bg {
            min-height: 100vh;
            background: linear-gradient(120deg, #e0e7ff 0%, #f8fafc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 10px;
        }
        .login-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(60,60,120,0.10);
            padding: 38px 32px 28px 32px;
            max-width: 410px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }
        h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #4f46e5;
            text-align: center;
            margin-bottom: 28px;
            letter-spacing: 1px;
        }
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .input-group label {
            font-size: 1rem;
            color: #374151;
            font-weight: 500;
        }
        .input-group input {
            padding: 10px 12px;
            border: 1px solid #c7d2fe;
            border-radius: 6px;
            font-size: 1rem;
            background: #f1f5f9;
            transition: border 0.2s;
        }
        .input-group input:focus {
            border-color: #6366f1;
            outline: none;
            background: #fff;
        }
        .login-error {
            color: #dc2626;
            background: #fee2e2;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 14px;
            font-size: 0.98rem;
        }
        .login-btn {
            margin-top: 10px;
            padding: 12px 0;
            background: linear-gradient(90deg, #6366f1 60%, #818cf8 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(99,102,241,0.10);
        }
        .login-btn:hover {
            background: linear-gradient(90deg, #4f46e5 60%, #6366f1 100%);
        }
        .login-link {
            text-align: center;
            margin-top: 22px;
            color: #64748b;
            font-size: 1rem;
        }
        .login-link a {
            color: #6366f1;
            text-decoration: underline;
            margin-left: 4px;
            transition: color 0.2s;
        }
        .login-link a:hover {
            color: #4f46e5;
        }
        @media (max-width: 500px) {
            .login-card {
                padding: 20px 8px 16px 8px;
            }
            .login-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>

<div class="login-bg">
    <div class="login-card">
        <h2 class="login-title">Welcome Back</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="login-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <!-- Registration Link -->
        <p class="login-link">
            Don't have an account?
            <a href="{{ route('register') }}">Register here</a>
        </p>
    </div>
</div>
</body>
</html>
