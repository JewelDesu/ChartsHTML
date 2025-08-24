<?php

  
$array = array();

$filepath = "/sys/class/thermal/thermal_zone0/temp";
$filedata = file_get_contents($filepath);
$writefile = fopen("/dev/ttyRPMSG0","w");

$val = $filedata / 1000;

fwrite($writefile, $val);
fclose($writefile);

$array['xA'] = $val;


header('Content-type: application/json');
echo json_encode($array);

?>