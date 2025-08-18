<?php

  
$array = array();

$filepath = "/sys/class/thermal/thermal_zone0/temp";
$filedata = file_get_contents($filepath);

$array['xA'] = $filedata / 1000;
header('Content-type: application/json');
echo json_encode($array);

?>