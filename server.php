<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='hh';

$con = new mysqli($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}
?>
