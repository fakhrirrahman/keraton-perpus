<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .login-container {
            display: flex;
            width: 900px;
            height: 550px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .login-image {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8));
        }

        .login-content {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-title {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .login-title h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .form-input {
            margin-bottom: 20px;
            position: relative;
        }

        .form-input input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-input input:focus {
            border-color: #667eea;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.2);
        }

        .login-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.15);
        }

        .extra-links {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                width: 90%;
                height: auto;
            }

            .login-image {
                height: 200px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-content">
            <div class="login-title">
                <h1>Welcome Back!</h1>
                <p>Sign in to continue to your dashboard</p>
            </div>
            <form class="login-form" action="{{ route('loginAct') }}" method="POST">
                @csrf
                <div class="form-input">
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">Sign In</button>
                <div class="extra-links">
                    {{-- <a href="#">Forgot Password?</a>
                    <a href="#">Create Account</a> --}}
                </div>
            </form>
        </div>
    </div>
</body>

</html>