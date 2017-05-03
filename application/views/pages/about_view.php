
<?php
$fp = fsockopen("mail.ssokudrang.com", 25, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: www.example.com\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
    while (!feof($fp)) {
        echo fgets($fp, 128);
    }
    fclose($fp);
}
echo "<br>";

$fp2 = fsockopen("ssl://smtp.gmail.com", 465, $errno, $errstr, 30);
if (!$fp2) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: www.example.com\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp2, $out);
    while (!feof($fp2)) {
        echo fgets($fp2, 128);
    }
    fclose($fp2);
}

$fp3 = fsockopen("http://mkho.moph.go.th", 80, $errno, $errstr, 30);
if (!$fp3) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: www.example.com\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp3, $out);
    while (!feof($fp3)) {
        echo fgets($fp3, 128);
    }
    fclose($fp2);
}
?>
