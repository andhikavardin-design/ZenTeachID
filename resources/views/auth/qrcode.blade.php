<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>QR Code Land Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
            position: relative;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .qr-wrapper {
            position: relative;
            display: inline-block;
        }
        .qr-wrapper img {
            border: 5px solid #4facfe;
            border-radius: 10px;
            display: block;
        }
        /* Tooltip link */
        .qr-link {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            opacity: 0;
            transition: opacity 0.3s;
            text-decoration: none;
        }
        .qr-wrapper:hover .qr-link {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Scan QR Code untuk Akses aplikasi ZenTechID</h2>
        <div class="qr-wrapper">
            <img src="{{ asset('Video/qr.jpg') }}" alt="QR Code" width="250">
            <!-- Link muncul pas mouse hover -->
            <a href="{{ url('/landpage') }}" class="qr-link" target="_blank">
                https://127.0.0.1:8000/ZenTechID
            </a>
        </div>
    </div>
</body>
</html>
