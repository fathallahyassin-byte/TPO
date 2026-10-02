<?php

require_once 'connexion.php';

class DialogueBD
{
    // ---------------------------------------------------------------
    // Fonctions génériques
    // ---------------------------------------------------------------
    private function getTout($sql, $params = array())
    {
        try {
            $conn = Connexion::getConnexion();
            $sth = $conn->prepare($sql);
            $sth->execute($params);
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            return array();
        }
    }

    private function getUn($sql, $params = array())
    {
        try {
            $conn = Connexion::getConnexion();
            $sth = $conn->prepare($sql);
            $sth->execute($params);
            return $sth->fetchObject();
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
            return false;
        }
    }

    // ---------------------------------------------------------------
    // Script 0 : Fournisseurs / Produits
    // ---------------------------------------------------------------
    public function getTousLesFournisseurs()
    {
        return $this->getTout("SELECT * FROM fournisseurs ORDER BY id");
    }

    public function getUnFournisseur($idFournisseur)
    {
        return $this->getUn("SELECT * FROM fournisseurs WHERE id=?", array($idFournisseur));
    }

    public function getProduitsFournisseur($idFournisseur)
    {
        return $this->getTout("SELECT * FROM produits WHERE fournisseur_id=? ORDER BY nom_produit", array($idFournisseur));
    }

    // ---------------------------------------------------------------
    // Script 1 : Livres / Emprunteurs
    // ---------------------------------------------------------------
    public function getTousLesLivres()
    {
        return $this->getTout("SELECT * FROM livres ORDER BY id");
    }

    public function getUnLivre($idLivre)
    {
        return $this->getUn("SELECT * FROM livres WHERE id=?", array($idLivre));
    }

    public function getEmprunteursLivre($idLivre)
    {
        return $this->getTout("SELECT * FROM emprunteurs WHERE id_livre=? ORDER BY nom, prenom", array($idLivre));
    }

    // ---------------------------------------------------------------
    // Script 2 : Veterinaires / Animaux
    // ---------------------------------------------------------------
    public function getTousLesVeterinaires()
    {
        return $this->getTout("SELECT * FROM veterinaires ORDER BY id");
    }

    public function getUnVeterinaire($idVeterinaire)
    {
        return $this->getUn("SELECT * FROM veterinaires WHERE id=?", array($idVeterinaire));
    }

    public function getAnimauxVeterinaire($idVeterinaire)
    {
        return $this->getTout("SELECT * FROM animaux WHERE veterinaire_id=? ORDER BY nom_animal", array($idVeterinaire));
    }

    // ---------------------------------------------------------------
    // Script 3 : Vols / Passagers
    // ---------------------------------------------------------------
    public function getTousLesVols()
    {
        return $this->getTout("SELECT * FROM vols ORDER BY date_depart");
    }

    public function getUnVol($idVol)
    {
        return $this->getUn("SELECT * FROM vols WHERE id=?", array($idVol));
    }

    public function getPassagersVol($idVol)
    {
        return $this->getTout("SELECT * FROM passagers WHERE vol_id=? ORDER BY nom, prenom", array($idVol));
    }

    // ---------------------------------------------------------------
    // Script 4 : Scenes / Artistes
    // ---------------------------------------------------------------
    public function getToutesLesScenes()
    {
        return $this->getTout("SELECT * FROM scenes ORDER BY id");
    }

    public function getUneScene($idScene)
    {
        return $this->getUn("SELECT * FROM scenes WHERE id=?", array($idScene));
    }

    public function getArtistesScene($idScene)
    {
        return $this->getTout("SELECT * FROM artistes WHERE scene_id=? ORDER BY nom_artiste", array($idScene));
    }

    // ---------------------------------------------------------------
    // Script 5 : Projets / Employes
    // ---------------------------------------------------------------
    public function getTousLesProjets()
    {
        return $this->getTout("SELECT * FROM projets ORDER BY date_debut");
    }

    public function getUnProjet($idProjet)
    {
        return $this->getUn("SELECT * FROM projets WHERE id=?", array($idProjet));
    }

    public function getEmployesProjet($idProjet)
    {
        return $this->getTout("SELECT * FROM employes WHERE projet_id=? ORDER BY nom, prenom", array($idProjet));
    }
}
