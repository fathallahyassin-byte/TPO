-- Étape 9 : données supplémentaires (à importer APRÈS les scripts 0 à 5)

-- Fournisseurs / Produits
INSERT INTO Fournisseurs (nom_fournisseur, adresse, email, telephone) VALUES
('Fournisseur F', '12 rue du Commerce, Lyon', 'contact@fournisseur-f.com', '04 78 12 34 56');
SET @id = LAST_INSERT_ID();
INSERT INTO Produits (nom_produit, description, prix, fournisseur_id) VALUES
('Commode', 'Commode 4 tiroirs en chêne', 220.00, @id),
('Miroir', 'Miroir mural rond', 45.00, @id),
('Banc', 'Banc d''entrée en pin', 90.00, @id);

-- Livres / Emprunteurs
INSERT INTO Livres (titre, auteur, genre) VALUES
('L''Étranger', 'Albert Camus', 'Roman philosophique');
SET @id = LAST_INSERT_ID();
INSERT INTO Emprunteurs (nom, prenom, adresse, email, id_livre) VALUES
('Bernard', 'Léa', '5 rue Victor Hugo, 69000 Lyon', 'lea.bernard@email.com', @id),
('Fabre', 'Nathan', '22 quai Saint-Antoine, 69000 Lyon', 'nathan.fabre@email.com', @id);

-- Veterinaires / Animaux
INSERT INTO Veterinaires (nom_veterinaire, specialisation) VALUES
('Dr. Lambert', 'NAC (nouveaux animaux de compagnie)');
SET @id = LAST_INSERT_ID();
INSERT INTO Animaux (nom_animal, espece, proprietaire, veterinaire_id) VALUES
('Caramel', 'Lapin', 'Emma Roux', @id),
('Pistache', 'Perroquet', 'Louis Blanc', @id),
('Noisette', 'Hamster', 'Jade Mercier', @id);

-- Vols / Passagers
INSERT INTO Vols (numero_vol, origine, destination, date_depart, date_arrivee) VALUES
('AF006', 'Paris', 'Montréal', '2023-05-06 09:30:00', '2023-05-06 11:45:00');
SET @id = LAST_INSERT_ID();
INSERT INTO Passagers (nom, prenom, numero_passport, vol_id) VALUES
('Gauthier', 'Manon', 'KK123987', @id),
('Henry', 'Tom', 'LL456321', @id);

-- Scenes / Artistes
INSERT INTO Scenes (nom_scene, capacite) VALUES
('Scène jazz', 1500);
SET @id = LAST_INSERT_ID();
INSERT INTO Artistes (nom_artiste, genre_musical, scene_id) VALUES
('Norah Jones', 'Jazz', @id),
('Gregory Porter', 'Jazz/Soul', @id);

-- Projets / Employes
INSERT INTO Projets (nom_projet, date_debut, date_fin) VALUES
('Projet F', '2024-01-08', '2024-03-29');
SET @id = LAST_INSERT_ID();
INSERT INTO Employes (nom, prenom, poste, projet_id) VALUES
('Fontaine', 'Julie', 'Chef de projet', @id),
('Morel', 'Antoine', 'Développeur back-end', @id),
('Chevalier', 'Emma', 'Testeuse QA', @id);
