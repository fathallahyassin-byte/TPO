<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/DialogueBD.php';
try {
// on crée un objet référant la classe DialogueBD
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $undlg = new DialogueBD();
    $fournisseur = $undlg->getUnFournisseur($id);
    $produits = $undlg->getProduitsFournisseur($id);
    if (!$fournisseur) {
        $erreur = "fournisseur introuvable";
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
    <title>Détail fournisseur</title>
</head>
<body>
<div class="container">
<a href="tableauFournisseurs.php" class="btn btn-default retour">&larr; Retour aux fournisseurs</a>
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
} else {
?>
<h1><?php echo htmlspecialchars($fournisseur->nom_fournisseur); ?></h1>
<p class="infos">
    <?php echo htmlspecialchars($fournisseur->adresse); ?> &middot;
    <?php echo htmlspecialchars($fournisseur->email); ?> &middot;
    <?php echo htmlspecialchars($fournisseur->telephone); ?>
</p>
<h2>Liste des produits</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <tr><th>Produit</th><th>Description</th><th>Prix</th></tr>
    <?php
    // Itération sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($produits as $ligne) {
        $nom = htmlspecialchars($ligne['nom_produit']);
        $desc = htmlspecialchars($ligne['description']);
        $prix = number_format($ligne['prix'], 2, ',', ' ');
        echo "<tr><td>$nom</td><td>$desc</td><td>$prix €</td></tr>";
    }
    if (count($produits) == 0) {
        echo "<tr><td colspan='3'>Aucun produit</td></tr>";
    }
    ?>
</table>
</div>
<?php } ?>
</div>
</body>
</html>
