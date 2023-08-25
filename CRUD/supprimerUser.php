<?php 
include './connect.php';
    if (!empty($_POST['cin'])) {
        $cin=$_POST['cin'];
        $dell = $pdo->prepare("DELETE FROM `users` WHERE cin = ?");
        $dell->execute([$cin]);
        header('location:../home.php');
    }
?>