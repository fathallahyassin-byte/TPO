CREATE TABLE Fournisseurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_fournisseur VARCHAR(100) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telephone VARCHAR(20) NOT NULL
);

CREATE TABLE Produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_produit VARCHAR(100) NOT NULL,
    description TEXT,
    prix DECIMAL(10,2) NOT NULL,
	fournisseur_id INT NOT NULL,
    FOREIGN KEY (fournisseur_id) REFERENCES Fournisseurs(id)	
);

INSERT INTO Fournisseurs (nom_fournisseur, adresse, email, telephone) VALUES
('Fournisseur A', '123 rue des exemples, Paris', 'contact@fournisseur-a.com', '01 23 45 67 89'),
('Fournisseur B', '456 avenue des fournisseurs, Paris', 'contact@fournisseur-b.com', '01 23 45 67 90'),
('Fournisseur C', '789 boulevard des produits, Paris', 'contact@fournisseur-c.com', '01 23 45 67 91'),
('Fournisseur D', '987 rue des stocks, Paris', 'contact@fournisseur-d.com', '01 23 45 67 92'),
('Fournisseur E', '654 avenue des commandes, Paris', 'contact@fournisseur-e.com', '01 23 45 67 93');


INSERT INTO Produits (nom_produit, description, prix, fournisseur_id) VALUES
('Chaise', 'Chaise en bois massif', 50.00,1),
('Table', 'Table en bois massif', 200.00,1),
('Bureau', 'Bureau en métal et verre', 150.00,2),
('Canapé', 'Canapé en cuir 3 places', 500.00,2),
('Lit', 'Lit double en bois', 300.00,3),
('Étagère', 'Étagère en métal', 100.00,3),
('Armoire', 'Armoire en bois massif', 400.00,4),
('Fauteuil', 'Fauteuil en cuir', 250.00,4),
('Tapis', 'Tapis en laine', 80.00,5),
('Lampe', 'Lampe sur pied en métal', 60.00,5);



