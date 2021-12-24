<?php

require_once './include/connect.php';
require './encdec.php';

session_start();

$id = $_SESSION['regid'];
echo $id;

$sql = "SELECT * FROM manager where eid=$id";
$result = mysqli_query($conn, $sql);

while($row=mysqli_fetch_assoc($result)){
    $password = $row['epasswd'];
    echo $password;
    $password = decrypt($password);
    echo $password;
}

?>