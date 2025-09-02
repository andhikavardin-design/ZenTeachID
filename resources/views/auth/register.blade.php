<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
            overflow: hidden;
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
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
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
            <h2>Register</h2>

            {{-- Menampilkan pesan kesalahan dari validasi --}}
            @if ($errors->any())
                <script>
                    let errorMessages = '';
                    @foreach ($errors->all() as $error)
                        errorMessages += "{{ $error }}\n";
                    @endforeach
                    alert("Terjadi kesalahan:\n" + errorMessages);
                </script>
            @endif

            <form method="post" action="{{ route('register') }}">
                @csrf
                <input type="text" name="nama" placeholder="Nama Lengkap" required value="{{ old('nama') }}">
                <input type="email" name="gmail" placeholder="Gmail" required value="{{ old('gmail') }}">
                <input type="text" name="no_telp" placeholder="Nomor Telepon" required value="{{ old('no_telp') }}">
                <input type="text" name="username" placeholder="Username" required value="{{ old('username') }}">
                <input type="password" name="password" placeholder="Password" required>
                
                <input type="submit" value="Register">
            </form>

            <div class="switch-link">
                Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
            </div>
        </div>
    </div>
</body>
</html>