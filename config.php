<?php
try{
    $con = new PDO("mysql:host=localhost;dbname=radioquran","root","");
}catch(Exception $e){
    die ($e->getMessage());
}
?>