CREATE TABLE Projets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_projet VARCHAR(100) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL
);

CREATE TABLE Employes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    poste VARCHAR(50) NOT NULL,
	    projet_id INT NOT NULL,
    FOREIGN KEY (projet_id) REFERENCES Projets(id)

);


INSERT INTO Projets (nom_projet, date_debut, date_fin) VALUES
('Projet A', '2023-04-01', '2023-05-01'),
('Projet B', '2023-05-15', '2023-06-30'),
('Projet C', '2023-07-01', '2023-08-31'),
('Projet D', '2023-09-01', '2023-10-15'),
('Projet E', '2023-10-20', '2023-12-20');

INSERT INTO Employes (nom, prenom, poste,projet_id) VALUES
('Dumont', 'Alexandre', 'Chef de projet',1),
('Martin', 'Sophie', 'Développeur',1),
('Petit', 'Camille', 'Intégrateur web',2),
('Moreau', 'Hugo', 'Rédacteur web',2),
('Garnier', 'Chloé', 'Community manager',3),
('Dupont', 'Clément', 'SEO manager',3),
('Lefebvre', 'Sarah', 'Développeur mobile',4),
('Rousseau', 'Lucas', 'Data analyst',4),
('Durand', 'Inès', 'UX designer',5);


