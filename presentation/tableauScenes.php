<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $undlg = new DialogueBD();
    $scenes = $undlg->getToutesLesScenes();
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
    <title>Tableau des scènes</title>
</head>
<body>
<div class="container">
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
}
?>
<a href="../index.php" class="btn btn-default retour">&larr; Accueil</a>
<h1>Tableau des scènes</h1>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
    <tr><th>Nom</th><th>Capacité</th><th></th></tr>
    <?php
    foreach ($scenes as $ligne) {
        $id = $ligne['id'];
        $nom = htmlspecialchars($ligne['nom_scene']);
        $capacite = number_format($ligne['capacite'], 0, ',', ' ');
        echo "<tr><td>$nom</td><td>$capacite places</td>";
        echo "<td><a href='detailScene.php?id=$id'>voir le détail</a></td></tr>";
    }
    ?>
</table>
</div>
</div>
</body>
</html>
