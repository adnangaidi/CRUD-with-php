<?php 
include './connect.php';
    if (!empty($_POST['num'])) {
        $num=$_POST['num'];
        $dell = $pdo->prepare("DELETE FROM `note_etudiant` WHERE num_inscrip = ?");
        $dell->execute([$num]);
        header('location:../home.php');
    }
?>