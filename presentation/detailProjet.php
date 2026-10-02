<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $undlg = new DialogueBD();
    $projet = $undlg->getUnProjet($id);
    $employes = $undlg->getEmployesProjet($id);
    if (!$projet) {
        $erreur = "projet introuvable";
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
    <title>Détail projet</title>
</head>
<body>
<div class="container">
<a href="tableauProjets.php" class="btn btn-default retour">&larr; Retour aux projets</a>
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
} else {
?>
<h1><?php echo htmlspecialchars($projet->nom_projet); ?></h1>
<p class="infos">
    Du <?php echo date('d/m/Y', strtotime($projet->date_debut)); ?>
    au <?php echo date('d/m/Y', strtotime($projet->date_fin)); ?>
</p>
<h2>Liste des employés</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <tr><th>Nom</th><th>Prénom</th><th>Poste</th></tr>
    <?php
    foreach ($employes as $ligne) {
        $nom = htmlspecialchars($ligne['nom']);
        $prenom = htmlspecialchars($ligne['prenom']);
        $poste = htmlspecialchars($ligne['poste']);
        echo "<tr><td>$nom</td><td>$prenom</td><td>$poste</td></tr>";
    }
    if (count($employes) == 0) {
        echo "<tr><td colspan='3'>Aucun employé</td></tr>";
    }
    ?>
</table>
</div>
<?php } ?>
</div>
</body>
</html>
