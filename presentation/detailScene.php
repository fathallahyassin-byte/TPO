<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $undlg = new DialogueBD();
    $scene = $undlg->getUneScene($id);
    $artistes = $undlg->getArtistesScene($id);
    if (!$scene) {
        $erreur = "scène introuvable";
    }
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
    <title>Détail scène</title>
</head>
<body>
<div class="container">
<a href="tableauScenes.php" class="btn btn-default retour">&larr; Retour aux scènes</a>
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
} else {
?>
<h1><?php echo htmlspecialchars($scene->nom_scene); ?></h1>
<p class="infos">Capacité : <?php echo number_format($scene->capacite, 0, ',', ' '); ?> places</p>
<h2>Liste des artistes</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <tr><th>Artiste</th><th>Genre musical</th></tr>
    <?php
    foreach ($artistes as $ligne) {
        $nom = htmlspecialchars($ligne['nom_artiste']);
        $genre = htmlspecialchars($ligne['genre_musical']);
        echo "<tr><td>$nom</td><td>$genre</td></tr>";
    }
    if (count($artistes) == 0) {
        echo "<tr><td colspan='2'>Aucun artiste</td></tr>";
    }
    ?>
</table>
</div>
<?php } ?>
</div>
</body>
</html>
