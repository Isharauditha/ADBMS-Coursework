<?php
$serverName = "ISHARAPC\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "myDB",
    "Uid" => "",
    "PWD" => ""
);
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
