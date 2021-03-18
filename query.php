<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();

define('DB_SERVER', 'seniorproj-db.cqiexl3pxle4.us-east-2.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'password22');
define('DB_NAME', 'registration');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// echo "Connected";

/*$query = "select * from Registered WHERE UserID=" .$_SESSION["id"];
$result = mysqli_query($link, $query);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}*/

$query = "select * from Registered WHERE UserID=" .$_SESSION["id"];
$result = mysqli_query($link, $query);
$data2 = array();

while ($row = mysqli_fetch_assoc($result)) {
    $query = "select * from courses WHERE courseID = ".$row["courseID"];
    $result2 = mysqli_query($link, $query);
    $row2 = mysqli_fetch_assoc($result2);
    $data2[] = $row2;
}

echo json_encode($data2);

$link->close();
?>