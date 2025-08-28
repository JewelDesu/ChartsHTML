<?php

  
$array = array();

$temp = "/tmp/m4/temp";
$hum = "/tmp/m4/hum";
$press = "/tmp/m4/press";
$filedata1 = file_get_contents($temp);
$filedata2 = file_get_contents($hum);
$filedata3 = file_get_contents($press);
//$writefile = fopen("/dev/ttyRPMSG0","w");


//fwrite($writefile, $val);
//fclose($writefile);

$array['temp'] = $filedata1;
$array['hum'] = $filedata2;
$array['press'] = $filedata3;

header('Content-type: application/json');
echo json_encode($array);

?>