<?php 
    //php connecting to XAMPP mysql
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
//     echo "successfully connected to database";
// }
// else{
    die("error" . mysqli_connect_error());
}


?>