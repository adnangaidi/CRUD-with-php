<?php 
include './connect.php';
$cin= $_POST['cin'];
$pass= $_POST['pass'];
$type= $_POST['type'];
if(isset($_POST['cin'])){
    $rep=$pdo->prepare("INSERT INTO users VALUES (?,?,?)");
$rep->execute(array($cin,$pass,$type));
header('location:../home.php');
}
?>