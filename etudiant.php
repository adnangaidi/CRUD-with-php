<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Releve note</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <table border="1">
            <tr>
                <th>Nom</th>
                <th>cin</th>
                <th>Note</th>
            </tr>
            <tr>
                <?php
                include './CRUD/connect.php';
                session_start();
                $cin = $_SESSION['cin'];
                $rep = $pdo->prepare("SELECT * FROM note_etudiant WHERE cin=?");
                $rep->execute([$cin]);
                $donne=$rep->fetch();
                echo "<td>" . $donne['nom'] . "</td>";
                echo "<td>" . $donne['cin'] . "</td>";
                echo "<td>" . $donne['note'] . "</td>";
                ?>
                </tr>
        </table>
    </div>
</body>
</html>