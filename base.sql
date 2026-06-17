CREATE TABLE produits (
  id INT NOT NULL AUTO_INCREMENT,
  nom TEXT NOT NULL,
  description TEXT,
  prix DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY nom (nom)
);

CREATE TABLE caisses (
  id INT NOT NULL AUTO_INCREMENT,
  nom TEXT NOT NULL,
  description TEXT,
  PRIMARY KEY (id),
  UNIQUE KEY nom (nom)
);


CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  nom TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE,
  mot_de_passe TEXT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE Achats (
  id INT NOT NULL AUTO_INCREMENT,
  idCaisse INT NOT NULL,
  idUser INT NOT NULL,
  quantite INT NOT NULL,
  montant DECIMAL(10,2) NOT NULL,
  dateAchat DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (idProduit) REFERENCES produits(id),
  FOREIGN KEY (idCaisse) REFERENCES caisses(id),
  FOREIGN KEY (idUser) REFERENCES users(id)
);

CREATE TABLE detailAchats (
  id INT NOT NULL AUTO_INCREMENT,
  idAchat INT NOT NULL,
  idProduit INT NOT NULL,
  quantite INT NOT NULL,
  montant DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (idAchat) REFERENCES Achats(id),
  FOREIGN KEY (idProduit) REFERENCES produits(id)
);