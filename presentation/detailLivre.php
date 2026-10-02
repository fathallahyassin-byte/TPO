<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $undlg = new DialogueBD();
    $livre = $undlg->getUnLivre($id);
    $emprunteurs = $undlg->getEmprunteursLivre($id);
    if (!$livre) {
        $erreur = "livre introuvable";
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
    <title>Détail livre</title>
</head>
<body>
<div class="container">
<a href="tableauLivres.php" class="btn btn-default retour">&larr; Retour aux livres</a>
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
} else {
?>
<h1><?php echo htmlspecialchars($livre->titre); ?></h1>
<p class="infos">
    <?php echo htmlspecialchars($livre->auteur); ?> &middot;
    <?php echo htmlspecialchars($livre->genre); ?>
</p>
<h2>Liste des emprunteurs</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Email</th></tr>
    <?php
    foreach ($emprunteurs as $ligne) {
        $nom = htmlspecialchars($ligne['nom']);
        $prenom = htmlspecialchars($ligne['prenom']);
        $adresse = htmlspecialchars($ligne['adresse']);
        $email = htmlspecialchars($ligne['email']);
        echo "<tr><td>$nom</td><td>$prenom</td><td>$adresse</td><td>$email</td></tr>";
    }
    if (count($emprunteurs) == 0) {
        echo "<tr><td colspan='4'>Aucun emprunteur</td></tr>";
    }
    ?>
</table>
</div>
<?php } ?>
</div>
</body>
</html>
