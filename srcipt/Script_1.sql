CREATE TABLE Livres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    auteur VARCHAR(50) NOT NULL,
    genre VARCHAR(50) NOT NULL
);

CREATE TABLE Emprunteurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    adresse VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    id_livre INT NOT NULL,
    FOREIGN KEY (id_livre) REFERENCES Livres(id)

);


INSERT INTO Livres (titre, auteur, genre) VALUES
('Les Misérables', 'Victor Hugo', 'Roman historique'),
('1984', 'George Orwell', 'Science-fiction'),
('Le Petit Prince', 'Antoine de Saint-Exupéry', 'Fiction'),
('Le Seigneur des Anneaux', 'J.R.R. Tolkien', 'Fantasy'),
('Orgueil et Préjugés', 'Jane Austen', 'Roman');

INSERT INTO Emprunteurs (nom, prenom, adresse, email, id_livre) VALUES
('Dumont', 'Alexandre', '12 rue des Lilas, 75000 Paris', 'alexandre.dumont@email.com',1),
('Martin', 'Sophie', '7 avenue des Tilleuls, 75000 Paris', 'sophie.martin@email.com',2),
('Leroy', 'Maxime', '94 boulevard des Roses, 75000 Paris', 'maxime.leroy@email.com',3),
('Petit', 'Camille', '42 rue de la Paix, 75000 Paris', 'camille.petit@email.com',4),
('Moreau', 'Hugo', '3 avenue des Peupliers, 75000 Paris', 'hugo.moreau@email.com',5),
('Garnier', 'Chloé', '18 rue des Cerisiers, 75000 Paris', 'chloe.garnier@email.com',5),
('Dupont', 'Clément', '56 boulevard Saint-Germain, 75000 Paris', 'clement.dupont@email.com',4),
('Lefebvre', 'Sarah', '29 rue du Faubourg Saint-Antoine, 75000 Paris', 'sarah.lefebvre@email.com',3),
('Rousseau', 'Lucas', '71 rue des Écoles, 75000 Paris', 'lucas.rousseau@email.com',2),
('Durand', 'Inès', '84 avenue de Clichy, 75000 Paris', 'ines.durand@email.com',1);

