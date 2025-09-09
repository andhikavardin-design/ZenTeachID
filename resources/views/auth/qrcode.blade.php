<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>QR Code Repo GitHub</title>
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
        <h2>Scan QR Code untuk Akses Repo GitHub ZenTechID</h2>
        <div class="qr-wrapper">
            <!-- Ganti qr.jpg dengan QR code yang berisi link GitHub -->
            <img src="{{  asset('Video/Zen.png') }}" alt="QR Code" width="250">
            
            <!-- Link ke GitHub -->
            <a href="https://github.com/andhikavardin-design/ZenTeachID" class="qr-link" target="_blank">
              
            </a>
        </div>
    </div>
</body>
</html>

