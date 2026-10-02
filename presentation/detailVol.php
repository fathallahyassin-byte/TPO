<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $undlg = new DialogueBD();
    $vol = $undlg->getUnVol($id);
    $passagers = $undlg->getPassagersVol($id);
    if (!$vol) {
        $erreur = "vol introuvable";
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
    <title>Détail vol</title>
</head>
<body>
<div class="container">
<a href="tableauVols.php" class="btn btn-default retour">&larr; Retour aux vols</a>
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
} else {
?>
<h1>Vol <?php echo htmlspecialchars($vol->numero_vol); ?></h1>
<p class="infos">
    <?php echo htmlspecialchars($vol->origine); ?> &rarr; <?php echo htmlspecialchars($vol->destination); ?> &middot;
    départ le <?php echo date('d/m/Y à H:i', strtotime($vol->date_depart)); ?> &middot;
    arrivée le <?php echo date('d/m/Y à H:i', strtotime($vol->date_arrivee)); ?>
</p>
<h2>Liste des passagers</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <tr><th>Nom</th><th>Prénom</th><th>N° passeport</th></tr>
    <?php
    foreach ($passagers as $ligne) {
        $nom = htmlspecialchars($ligne['nom']);
        $prenom = htmlspecialchars($ligne['prenom']);
        $passeport = htmlspecialchars($ligne['numero_passport']);
        echo "<tr><td>$nom</td><td>$prenom</td><td>$passeport</td></tr>";
    }
    if (count($passagers) == 0) {
        echo "<tr><td colspan='3'>Aucun passager</td></tr>";
    }
    ?>
</table>
</div>
<?php } ?>
</div>
</body>
</html>
