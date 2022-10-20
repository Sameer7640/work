<?php
set_time_limit(0); // safe_mode is off

ini_set('max_execution_time', 10000); //500 seconds

define('BUFSIZ', 4095);
$url = 'https://shielddentalcare.com/wp-content/ai1wm-backups/shielddentalcare.com-20220613-102014-56fd4k.wpress';
$rfile = fopen($url, 'r');
$lfile = fopen(basename($url), 'w');
while (!feof($rfile))
    fwrite($lfile, fread($rfile, BUFSIZ), BUFSIZ);
fclose($rfile);
fclose($lfile);
