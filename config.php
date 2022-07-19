<?php
define("DB_HOST", "localhost"); //write your host
define("DB_USER", "postastc_posta321"); //write your db username
define("DB_PASSWORD", "Y5-p_TKP&A.}"); //write your db password
define("DB_DATABASE", "postastc_postaplus"); //write your database name
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($con, DB_DATABASE);
?>