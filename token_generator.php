<?php
session_start();

$file = fopen("token.txt", "w") or die("Unable to open file!");
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$txt = $_SESSION['token'].",";

fwrite($file, $txt);
$session_id = session_id();
setcookie('session_time', $session_id, time()+60*60*20*365,'/');
$txt1 = $session_id."\n";
fwrite($file, $txt1);
fclose($file);

echo $_SESSION['token'];

?>