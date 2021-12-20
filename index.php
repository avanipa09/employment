<?php

require_once('./include/connect.php');
session_start();

$status = "";
$userType = "";

if(isset($_SESSION['regid'])){
    $id = $_SESSION['regid'];
    // echo $id;
}

$sql = "SELECT * FROM tbl_registration where regid=$id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $status = $row['status'];
}

if($status==0){
 $userType = "User";
}else if($status==1){
    $userType = "Company";
}

echo $userType;

?>