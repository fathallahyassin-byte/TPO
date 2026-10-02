CREATE TABLE Scenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_scene VARCHAR(50) NOT NULL,
    capacite INT NOT NULL
);

CREATE TABLE Artistes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_artiste VARCHAR(100) NOT NULL,
    genre_musical VARCHAR(50) NOT NULL,
    scene_id INT NOT NULL,
	    FOREIGN KEY (scene_id) REFERENCES Scenes(id)

);


INSERT INTO Scenes (nom_scene, capacite) VALUES
('Scène principale', 10000),
('Scène secondaire', 5000),
('Scène électronique', 3000),
('Scène acoustique', 2000),
('Scène découverte', 1000);

INSERT INTO Artistes (nom_artiste, genre_musical,scene_id) VALUES
('Daft Punk', 'Électronique',1),
('Beyoncé', 'Pop/R&B',2),
('Coldplay', 'Rock',1),
('Rihanna', 'Pop/R&B',2),
('Eminem', 'Rap',4),
('The Weeknd', 'R&B',3),
('Adele', 'Pop',4),
('Taylor Swift', 'Pop',3),
('Kendrick Lamar', 'Rap',5);


