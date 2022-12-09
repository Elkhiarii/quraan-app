<?php 
session_start();
if(!isset($_SESSION['users'])){
    header("location:login.php");
}
else{
    include("../config.php");
    $admin = $con->query("Select type from admin WHERE user = '".$_SESSION['users']."';")->fetchcolumn();
    if ($admin == 1)
    {
    $sql = "delete from admin where id = ?;";
    $rst = $con->prepare($sql);
    $rst->execute([$_GET["id"]]);
    }
    header("location:user.php");
}
?>