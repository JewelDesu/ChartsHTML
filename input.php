<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $var = $_POST["input"];

    $filename = __DIR__ . "/webvar";
    $fh = fopen($filename, "w");
    fwrite($fh, $var);
    fclose($fh);

    echo "Wrote to $filename";

    echo exec("/usr/local/bin/write > /dev/null &");
    
}
?>