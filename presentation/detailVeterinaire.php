<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $undlg = new DialogueBD();
    $veterinaire = $undlg->getUnVeterinaire($id);
    $animaux = $undlg->getAnimauxVeterinaire($id);
    if (!$veterinaire) {
        $erreur = "vétérinaire introuvable";
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
    <title>Détail vétérinaire</title>
</head>
<body>
<div class="container">
<a href="tableauVeterinaires.php" class="btn btn-default retour">&larr; Retour aux vétérinaires</a>
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
} else {
?>
<h1><?php echo htmlspecialchars($veterinaire->nom_veterinaire); ?></h1>
<p class="infos"><?php echo htmlspecialchars($veterinaire->specialisation); ?></p>
<h2>Liste des animaux</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <tr><th>Nom</th><th>Espèce</th><th>Propriétaire</th></tr>
    <?php
    foreach ($animaux as $ligne) {
        $nom = htmlspecialchars($ligne['nom_animal']);
        $espece = htmlspecialchars($ligne['espece']);
        $proprietaire = htmlspecialchars($ligne['proprietaire']);
        echo "<tr><td>$nom</td><td>$espece</td><td>$proprietaire</td></tr>";
    }
    if (count($animaux) == 0) {
        echo "<tr><td colspan='3'>Aucun animal</td></tr>";
    }
    ?>
</table>
</div>
<?php } ?>
</div>
</body>
</html>
