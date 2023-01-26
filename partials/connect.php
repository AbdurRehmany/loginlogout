<?php
$server = 'localhost';
$name = 'root';
$password = '';
$database  = 'user033';

$conn = mysqli_connect($server,$name,$password,$database);
if(!$conn)
{
    die ("Error" . mysqli_connect_error());
// }
// else
// {
//     die ("Error" . mysqli_connect_error());
} 
?>