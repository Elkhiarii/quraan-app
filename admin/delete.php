<?php 
session_start();
if(!isset($_SESSION['users'])){
    header("location:login.php");
}
else{
    include("../config.php");
    $sql = "delete from qari2 where id = ?;";
    $rst = $con->prepare($sql);
    $rst->execute([$_GET["id"]]);
    header("location:radio.php");
}
?>