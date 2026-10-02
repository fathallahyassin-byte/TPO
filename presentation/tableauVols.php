<?php
// PARTIE DONNES ---------------------------------------------------------
require_once '../persistance/DialogueBD.php';
try {
    $undlg = new DialogueBD();
    $vols = $undlg->getTousLesVols();
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
    <title>Tableau des vols</title>
</head>
<body>
<div class="container">
<?php
if (isset($erreur)) {
    echo "<div class='alert alert-danger'>Erreur : $erreur</div>";
}
?>
<a href="../index.php" class="btn btn-default retour">&larr; Accueil</a>
<h1>Tableau des vols</h1>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
    <tr><th>N° vol</th><th>Origine</th><th>Destination</th><th>Départ</th><th>Arrivée</th><th></th></tr>
    <?php
    foreach ($vols as $ligne) {
        $id = $ligne['id'];
        $numero = htmlspecialchars($ligne['numero_vol']);
        $origine = htmlspecialchars($ligne['origine']);
        $destination = htmlspecialchars($ligne['destination']);
        $depart = date('d/m/Y H:i', strtotime($ligne['date_depart']));
        $arrivee = date('d/m/Y H:i', strtotime($ligne['date_arrivee']));
        echo "<tr><td>$numero</td><td>$origine</td><td>$destination</td><td>$depart</td><td>$arrivee</td>";
        echo "<td><a href='detailVol.php?id=$id'>voir le détail</a></td></tr>";
    }
    ?>
</table>
</div>
</div>
</body>
</html>
