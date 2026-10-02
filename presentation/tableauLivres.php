<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $undlg = new DialogueBD();
    $livres = $undlg->getTousLesLivres();
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
    <title>Tableau des livres</title>
</head>
<body>
<div class="container">
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
}
?>
<a href="../index.php" class="btn btn-default retour">&larr; Accueil</a>
<h1>Tableau des livres</h1>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
    <tr><th>Titre</th><th>Auteur</th><th>Genre</th><th></th></tr>
    <?php
    foreach ($livres as $ligne) {
        $id = $ligne['id'];
        $titre = htmlspecialchars($ligne['titre']);
        $auteur = htmlspecialchars($ligne['auteur']);
        $genre = htmlspecialchars($ligne['genre']);
        echo "<tr><td>$titre</td><td>$auteur</td><td>$genre</td>";
        echo "<td><a href='detailLivre.php?id=$id'>voir le détail</a></td></tr>";
    }
    ?>
</table>
</div>
</div>
</body>
</html>
