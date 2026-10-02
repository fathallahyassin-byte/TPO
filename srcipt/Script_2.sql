CREATE TABLE Veterinaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_veterinaire VARCHAR(50) NOT NULL,
    specialisation VARCHAR(50) NOT NULL
);

CREATE TABLE Animaux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_animal VARCHAR(50) NOT NULL,
    espece VARCHAR(50) NOT NULL,
    proprietaire VARCHAR(100) NOT NULL,
    veterinaire_id INT NOT NULL,	
    FOREIGN KEY (veterinaire_id) REFERENCES Veterinaires(id)
);


INSERT INTO Veterinaires (nom_veterinaire, specialisation) VALUES
('Dr. Dubois', 'Médecine générale'),
('Dr. Sanchez', 'Dermatologie'),
('Dr. Bernard', 'Cardiologie'),
('Dr. Petit', 'Chirurgie'),
('Dr. Nguyen', 'Médecine générale');


INSERT INTO Animaux (nom_animal, espece, proprietaire, veterinaire_id) VALUES
('Buddy', 'Chien', 'Jean Dupont',1),
('Milo', 'Chat', 'Sophie Martin',2),
('Bella', 'Chien', 'Paul Leroy',3),
('Oliver', 'Chat', 'Marie Petit',4),
('Max', 'Chien', 'Julien Moreau',5),
('Simba', 'Chat', 'Nathalie Garnier',5),
('Rocky', 'Chien', 'Théo Dupont',4),
('Mimi', 'Chat', 'Aurélie Lefebvre',3),
('Rex', 'Chien', 'Camille Rousseau',2),
('Kitty', 'Chat', 'Alexandre Durand',1);





