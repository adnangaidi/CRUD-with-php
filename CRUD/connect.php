<?php 
$dbname="exercice";
$localh="mysql:host=localhost;dbname=$dbname";
$user="root";
$pass="";
try{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $pdo=new PDO($localh,$user,$pass);
}catch(PDOException $e){
    echo $e->getMessage();
}

?>