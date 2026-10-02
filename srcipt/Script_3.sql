CREATE TABLE Vols (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_vol VARCHAR(10) UNIQUE NOT NULL,
    origine VARCHAR(100) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    date_depart DATETIME NOT NULL,
    date_arrivee DATETIME NOT NULL
);

CREATE TABLE Passagers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    numero_passport VARCHAR(20) UNIQUE NOT NULL,
	    vol_id INT NOT NULL,
    FOREIGN KEY (vol_id) REFERENCES Vols(id)

);

INSERT INTO Vols (numero_vol, origine, destination, date_depart, date_arrivee) VALUES
('AF001', 'Paris', 'New York', '2023-05-01 08:00:00', '2023-05-01 14:00:00'),
('AF002', 'Paris', 'Londres', '2023-05-02 10:00:00', '2023-05-02 11:00:00'),
('AF003', 'Paris', 'Tokyo', '2023-05-03 12:00:00', '2023-05-04 06:00:00'),
('AF004', 'Paris', 'Sydney', '2023-05-04 14:00:00', '2023-05-05 18:00:00'),
('AF005', 'Paris', 'Dubai', '2023-05-05 16:00:00', '2023-05-05 22:00:00');


INSERT INTO Passagers (nom, prenom, numero_passport, vol_id) VALUES
('Dumont', 'Alexandre', 'AA123456',1),
('Martin', 'Sophie', 'BB234567',2),
('Leroy', 'Maxime', 'CC345678',3),
('Petit', 'Camille', 'DD456789',4),
('Moreau', 'Hugo', 'EE567890',5),
('Garnier', 'Chloé', 'FF678901',5),
('Dupont', 'Clément', 'GG789012',4),
('Lefebvre', 'Sarah', 'HH890123',3),
('Rousseau', 'Lucas', 'II901234',2),
('Durand', 'Inès', 'JJ012345',1);


