<?php 
include './connect.php';
$num= $_POST['num'];
$cin= $_POST['cin'];
$nom= $_POST['nom'];
$note= $_POST['note'];
if(isset($_POST['cin']) && isset($_POST['note'])){
    $rep=$pdo->prepare("INSERT INTO note_etudiant VALUES (?,?,?,?)");
$rep->execute(array($num,$cin,$nom,$note));
header('location:../home.php');
}
?>