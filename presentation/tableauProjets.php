<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $undlg = new DialogueBD();
    $projets = $undlg->getTousLesProjets();
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
    <title>Tableau des projets</title>
</head>
<body>
<div class="container">
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
}
?>
<a href="../index.php" class="btn btn-default retour">&larr; Accueil</a>
<h1>Tableau des projets</h1>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
    <tr><th>Projet</th><th>Date de début</th><th>Date de fin</th><th></th></tr>
    <?php
    foreach ($projets as $ligne) {
        $id = $ligne['id'];
        $nom = htmlspecialchars($ligne['nom_projet']);
        $debut = date('d/m/Y', strtotime($ligne['date_debut']));
        $fin = date('d/m/Y', strtotime($ligne['date_fin']));
        echo "<tr><td>$nom</td><td>$debut</td><td>$fin</td>";
        echo "<td><a href='detailProjet.php?id=$id'>voir le détail</a></td></tr>";
    }
    ?>
</table>
</div>
</div>
</body>
</html>
