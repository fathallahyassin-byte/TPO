<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $undlg = new DialogueBD();
    $fournisseurs = $undlg->getTousLesFournisseurs();
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
    <title>Tableau des fournisseurs</title>
</head>
<body>
<div class="container">
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
}
?>
<a href="../index.php" class="btn btn-default retour">&larr; Accueil</a>
<h1>Tableau des fournisseurs</h1>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
    <tr><th>Nom</th><th>Adresse</th><th>Email</th><th>Tel</th><th></th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($fournisseurs as $ligne) {
        $id = $ligne['id'];
        $nom = htmlspecialchars($ligne['nom_fournisseur']);
        $adresse = htmlspecialchars($ligne['adresse']);
        $email = htmlspecialchars($ligne['email']);
        $tel = htmlspecialchars($ligne['telephone']);
        echo "<tr><td>$nom</td><td>$adresse</td><td>$email</td><td>$tel</td>";
        echo "<td><a href='detailFournisseur.php?id=$id'>voir le détail</a></td></tr>";
    }
    ?>
</table>
</div>
</div>
</body>
</html>
