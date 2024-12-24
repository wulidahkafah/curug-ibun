<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'curug';


$db = mysqli_connect($hostname, $username, $password, $db_name);

if ($db->connect_error){
    echo 'gagal';
}else{
    echo 'berhasil';
}
?>