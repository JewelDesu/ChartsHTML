<?php

// Map sensor file paths
$files = [
    'temp' => __DIR__ . '/tmp/m4/temp',
    'hum'  => __DIR__ . '/tmp/m4/hum',
    'press'=> __DIR__ . '/tmp/m4/press'
];

$data = [];

// Loop over each sensor file
foreach ($files as $key => $filePath) {
    // Default value if file is missing
    $value = "N/A";

    if (file_exists($filePath)) {
        // Open the file for reading
        $fp = fopen($filePath, "r");
        if ($fp) {
            // Acquire shared lock (other process can still write later)
            if (flock($fp, LOCK_SH)) {
                // Read contents safely
                $value = trim(fread($fp, filesize($filePath)));
                flock($fp, LOCK_UN); // release lock
            }
            fclose($fp);
        }
    }

    $data[$key] = $value;
}

// Return as JSON
header('Content-Type: application/json');
echo json_encode($data);

?>
