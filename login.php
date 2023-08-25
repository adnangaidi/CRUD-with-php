<?php
include './CRUD/connect.php';  
$d="Directeur";
$rep=$pdo->prepare("SELECT * FROM users ");
$rep->execute();

while($donne=$rep->fetch()){
if($_POST["cin"]==$donne["cin"] && $_POST["pass"]==$donne["pass"]){
            if( $_POST['type']==$d){
                session_start();
                $_SESSION['cin']=$_POST['cin'];
                header('location: home.php');
            }
            else{
                session_start();
                $_SESSION['cin']=$_POST['cin'];
                header('location: etudiant.php');
            }
    }    
}
?>