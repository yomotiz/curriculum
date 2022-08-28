<?php

$txtf = "text.txt";
$con = "ボンジュール (￣∠ ￣ )ノ";

if(is_writable($txtf)){
    echo "writable<br>";
    $fp = fopen($txtf, "a");
    fwrite($fp,$con);
    fclose($fp);
    echo "finish writable<br>";

}else{
    echo "not writable";
    exit;
}

?>

<?php
$txtf = "text2.txt";
$con = "ボンジュール (￣∠ ￣ )ノ";

if(is_readable($txtf)){
    echo "readable<br>";
    $fp = fopen($txtf, "r");
    while($line = fgets($fp)){
        echo $line."<br>";
    }
    fclose($fp);
    echo "finish readable";

}else{
    echo "not readable";
    exit;
}
?>