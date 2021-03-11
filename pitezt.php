<?php
$mysqli = new mysqli('127.0.0.1', 'root', 'BhRXXDdw', 'mysql');
if ($mysqli->connect_errno) {
    echo "Can't connect to mysql. Err num: " . $mysqli->connect_errno . "\n";
    echo "Desc: " . $mysqli->connect_error . "\n";
}
$sql = "select sleep(5);";
if (!$result = $mysqli->query($sql)) {
    echo "Query: " . $sql . "\n";
    echo "Err num: " . $mysqli->errno . "\n";
    echo "Desc: " . $mysqli->error . "\n";
    exit;
}
$actor = $result->fetch_row();
while ($actor = $result->fetch_row()) {
    echo  $actor[0] . "<br>\n";
}
$result->free();
$mysqli->close();
//fhdfhfd();
for ($i = 1; $i <= 10; $i++) {
    echo date('l jS \of F Y h:i:s A'),"<br>\n";
//    sleep(60);
}
phpinfo();
