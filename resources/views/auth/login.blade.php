<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            overflow: hidden;
            position: relative;
        }

        video.bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
        }

        .center {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            width: 350px;
            color: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            animation: fadeIn 1s ease-in-out;
            display: flex;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        .switch-link {
            text-align: center;
            margin-top: 15px;
        }

        .switch-link a {
            color: #00d0ff;
            text-decoration: none;
            font-weight: bold;
        }

        .switch-link a:hover {
            text-decoration: underline;
        }

        .admin-link-in-form {
            text-align: center;
            margin-top: 10px;
        }

        .admin-link-in-form a {
            color: #00d0ff;
            text-decoration: none;
            font-weight: bold;
        }

        .admin-link-in-form a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            text-align: center;
            margin-top: -5px;
            margin-bottom: 10px;
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>

    <video autoplay muted loop class="bg-video">
        <source src="{{ asset('video/v.mp4') }}" type="video/mp4">
        Browser Anda tidak mendukung tag video.
    </video>

    <div class="center">
        <div class="form-container">
            <h2>Login</h2>
            @if (session('success'))
                <div style="color: green; text-align: center; margin-bottom: 10px;">
                    {{ session('success') }}
                </div>
            @endif
            @error('username')
                <span class="error-message">{{ $message }}</span>
            @enderror
            <form method="post" action="{{ route('login') }}">
                @csrf
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
            </form>
            <div class="switch-link">
                Belum punya akun? <a href="{{ route('register') }}">Register di sini</a>
            </div>
            <div class="admin-link-in-form">
                Login sebagai <a href="{{ route('admin.login') }}">Admin</a>
            </div>
        </div>
    </div>
    
</body>
</html>
