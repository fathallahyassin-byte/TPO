<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $undlg = new DialogueBD();
    $veterinaires = $undlg->getTousLesVeterinaires();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../design.css"/>
    <title>Tableau des vétérinaires</title>
</head>
<body>
<div class="container">
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
}
?>
<a href="../index.php" class="btn btn-default retour">&larr; Accueil</a>
<h1>Tableau des vétérinaires</h1>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
    <tr><th>Nom</th><th>Spécialisation</th><th></th></tr>
    <?php
    foreach ($veterinaires as $ligne) {
        $id = $ligne['id'];
        $nom = htmlspecialchars($ligne['nom_veterinaire']);
        $specialisation = htmlspecialchars($ligne['specialisation']);
        echo "<tr><td>$nom</td><td>$specialisation</td>";
        echo "<td><a href='detailVeterinaire.php?id=$id'>voir le détail</a></td></tr>";
    }
    ?>
</table>
</div>
</div>
</body>
</html>
