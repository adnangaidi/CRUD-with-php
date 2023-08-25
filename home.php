<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Student</title>
  <link rel="stylesheet" href="./style/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</head>

<body>
  <!-- Modal Ajouter User -->
  <div class="modal fade" id="AjouterEtudiant" tabindex="-1" role="dialog" aria-labelledby="AjouterEtudiantTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
                <h5 class="modal-title" id="AjouterEtudiantTitle">Ajouter User</h5>
 </div>
        <div class="modal-body">
          <form action="./CRUD/ajouterEtudiant.php" method="post">
            <input class="inp" type="text" name="cin" placeholder="Cin"><br><br>
            <input class="inp" type="password" name="pass" placeholder="Mot de passe"><br><br>
            <select class="inp" name="type">
              <option value="Directeur">Directeur</option>
              <option value="Etudiant">Etudiant</option>
            </select><br><br>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <input type="submit" value="Envoyer" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal Supprimer User -->
   <div class="modal fade" id="SupprimerUser" tabindex="-1" role="dialog" aria-labelledby="SupprimerUserTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
                <h5 class="modal-title" id="SupprimerUserTitle">Supprimer User</h5>
 </div>
        <div class="modal-body">
          <form method="post" action="./CRUD/supprimerUser.php">
            <span>Êtes-vous sûr de vouloir supprimer cet Etudian de CIN: </span>
            <input class="inp" id="cinId" type="text" name="cin" value="" readonly><br><br>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <input type="submit" value="confirmer" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>
    <div id="tab">
      <table border="1">
        <tr>
          <th>Cin</th>
          <th>Type</th>
          <th>Action</th>
        </tr>
        <?php
        include './CRUD/connect.php';
        $rep = $pdo->prepare("SELECT * FROM users ");
        $rep->execute();
        $donne = $rep->fetchAll();
        for ($i = 0; $i < count($donne); $i++) {
          if ($donne[$i]['type'] == "Etudiant") {
            echo "<tr>";
            echo "<td id='cin'>" . $donne[$i]['cin'] . "</td>";
            echo "<td id='type'>" . $donne[$i]['type'] . "</td>";
            echo "<td>
<button type='button' class='supprimerUser-btn' data-toggle='modal' data-target='#SupprimerUser' >
Supprimer
</button></td>";
            echo "</tr>";
          }
        }
        ?>
      </table>
      <div id="input">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AjouterEtudiant">
          Ajouter
        </button>
      </div>
  </div><br><br>
  <div id="tab">
    <table border="1">
      <tr>
        <th>Num inscricption</th>
        <th>nom</th>
        <th>Note</th>
        <th>Action</th>
      </tr>
      <?php
      include './CRUD/connect.php';
      $rep = $pdo->prepare("SELECT * FROM note_etudiant ");
      $rep->execute();
      $donne = $rep->fetchAll();
      for ($i = 0; $i < count($donne); $i++) {
        echo "<tr>";
        echo "<td id='num'>" . $donne[$i]['num_inscrip'] . "</td>";
        echo "<td id='nom'>" . $donne[$i]['nom'] . "</td>";
        echo "<td id='note'>" . $donne[$i]['note'] . "</td>";
        echo "<td><button type='button' class='modifier-btn'  data-toggle='modal' data-target='#Modifier'>
Modifier
</button>
<button type='button' class='supprimer-btn' data-toggle='modal' data-target='#Supprimer' >
Supprimer
</button></td>";
        echo "</tr>";
      }
      ?>
    </table>
  </div>
  <div id="input">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Ajouter">
      Ajouter Note
    </button>
  </div>
  <!-- Modal Ajouter Note -->
  <div class="modal fade" id="Ajouter" tabindex="-1" role="dialog" aria-labelledby="AjouterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
                <h5 class="modal-title" id="AjouterTitle">Ajouter Note</h5>
 </div>
        <div class="modal-body">
          <form action="./CRUD/ajouterNote.php" method="post">
            <input class="inp" type="number" name="num" placeholder="num_Student"><br><br>
            <input class="inp" type="text" name="cin" placeholder="CIN"><br><br>
            <input class="inp" type="text" name="nom" placeholder="Nom"><br><br>
            <input class="inp" type="number" step="0.01" name="note" placeholder="Entrez Note Student"><br><br>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <input type="submit" value="Envoyer" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Modifier -->
  <div class="modal fade" id="Modifier" tabindex="-1" role="dialog" aria-labelledby="ModifierTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
                <h5 class="modal-title" id="ModifierTitle">Modifier Note</h5>
 </div>
        <div class="modal-body">
        
          <form method="post" action="./CRUD/modifier.php">
            <input class="inp" id="numId" type="number" name="num" value="" readonly><br><br>
            <input class="inp" id="nomId" type="text" name="nom" value=""><br><br>
            <input class="inp" id="noteId" type="number" step="0.01" name="note" value=""><br><br>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <input type="submit" value="Envoyer" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Supprimer -->
  <div class="modal fade" id="Supprimer" tabindex="-1" role="dialog" aria-labelledby="SupprimerTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
                <h5 class="modal-title" id="SupprimerTitle">Supprimer Note</h5>
 </div>
        <div class="modal-body">
          <form method="post" action="./CRUD/supprimer.php">
            <span>Êtes-vous sûr de vouloir supprimer cet Etudian de numéro d'inscription: </span>
            <input class="inp" id="numIdsupr" type="number" name="num" value="" readonly><br><br>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <input type="submit" value="confirmer" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('.modifier-btn').click(function() {
        var row = $(this).closest('tr');
        var num = row.find('#num').text();
        var nom = row.find('#nom').text();
        var note = row.find('#note').text();
        $('#numId').val(num);
        $('#nomId').val(nom);
        $('#noteId').val(note);
      });
      $('.supprimer-btn').click(function() {
        var row = $(this).closest('tr');
        var num = row.find('#num').text();
        $('#numIdsupr').val(num);
      });
      
      $('.supprimerUser-btn').click(function() {
        var row = $(this).closest('tr');
        var num = row.find('#cin').text();
        $('#cinId').val(num);
      });
    });
  </script>
</body>
</html>