<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        /* CSS asli dari Anda */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        .bg-video {
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
            padding: 30px;
            border-radius: 12px;
            width: 320px;
            color: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.4);
            position: relative;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.8em;
            font-weight: 600;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px 15px;
            margin: 8px 0;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            outline: none;
            transition: background 0.3s ease;
        }

        input[type="text"]::placeholder, input[type="password"]::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input[type="text"]:focus, input[type="password"]:focus {
            background: rgba(255, 255, 255, 0.3);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #00c2ff;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #00e0ff;
        }

        .switch-link {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9em;
        }

        .switch-link a {
            color: #00d0ff;
            text-decoration: none;
            font-weight: bold;
        }

        .switch-link a:hover {
            text-decoration: underline;
        }

        .admin-login-link {
            position: absolute;
            bottom: 10px;
            right: 15px;
            font-size: 0.8em;
        }

        .admin-login-link a {
            color: #00c2ff;
            text-decoration: none;
            font-weight: bold;
        }

        .admin-login-link a:hover {
            text-decoration: underline;
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
            <h2>Login Admin</h2>

            {{-- Menampilkan pesan kesalahan dari controller jika ada --}}
            @if(session('error'))
                <script>
                    alert('❌ {{ session('error') }}');
                </script>
            @endif

            <!-- Form login yang sudah disesuaikan untuk Laravel -->
            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf <!-- Perlindungan dari CSRF -->
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
            </form>

            <div class="switch-link">
                <a href="{{ route('login') }}">Login sebagai Pengguna>></a>
            </div>
        </div>
    </div>
</body>
</html>
