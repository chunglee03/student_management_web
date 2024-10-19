<?php

$SERVER = 'localhost';
$USERNAME = 'root';
$DATABASE = 'qlsv_db';
$PASSWORD = '';

$conn = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);

if(!$conn) {
    echo "Ket noi that bai!";
}

?>