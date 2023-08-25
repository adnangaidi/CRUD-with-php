<?php 
include './connect.php';

if(isset($_POST['note'])){
    $nom=$_POST['nom'];
    $num=$_POST['num'];
    $note=$_POST['note'];
    $mod=$pdo->prepare("UPDATE note_etudiant SET nom=? , note=? WHERE num_inscrip=? ");
    $mod->execute(array($nom,$note,$num));
header('location:../home.php');
}
?>