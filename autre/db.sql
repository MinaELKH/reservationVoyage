#### Créer la base de données et les tables (Clients, Activité, Réservations).
CREATE DATABASE voyage;


USE voyage; 

CREATE TABLE client (
    id_client INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,  
     telephone VARCHAR(15),
    adresse TEXT,
    date_naissance DATE
);



CREATE TABLE activite (
    id_activite INT(11) AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    destination VARCHAR(100) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,    
    date_debut DATE , 
      date_fin DATE ,
    place_disponible INT(11)
);   

CREATE TABLE reservation (
    id_reservation INT(11) AUTO_INCREMENT PRIMARY KEY,
    id_client INT(11),  
    id_activite INT(11),  
    statut ENUM('En attente', 'Confirmée', 'Annulée') NOT NULL,
    date_reservation TIMESTAMP  NOT NULL,
    FOREIGN KEY (id_client) REFERENCES client(id_client), 
    FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
);




### Mise à jour des tables: Modifier des champs des tables.

alter TABLE client 
ADD COLUMN sexe int(11) ; 

alter TABLE client
MODIFY COLUMN sexe DOUBLE ;

alter table client 
drop COLUMN sexe  ; 





INSERT into client (nom , prenom , email , telephone , adresse , date_naissance ) 
VALUES ("Mina" , "ELKH" , "mina@gmail.com", "06584526", "safi youcode 54 rue 7 " , "2007-02-25")  ;

INSERT into activite(titre , description , destination , prix , date_debut , date_fin , place_disponible ) 
VALUES ("Voyage de reve" , "voyage plein d aventures" , "Gaza", 1000, "2024-12-09", "2024-12-25" , 25)  ;  


INSERT into reservation(id_client , id_activite,  date_reservation , statut ) 
VALUES (1 , 1  , "08/12/2024" , 'confirmée') ; 


### Insertion : Ajouter une nouvelle réservation.
INSERT INTO activite (titre, description, destination, prix, date_debut, date_fin, place_disponible) 
VALUES 
("Safari Africain", "Expérience inoubliable dans la savane", "Kenya", 1500, "2025-01-10", "2025-01-20", 20),
("Croisière en Méditerranée", "Détente et découverte en mer", "Grèce", 1200, "2024-06-15", "2024-06-30", 30),
("Exploration Antarctique", "Voyage unique au bout du monde", "Antarctique", 5000, "2025-02-01", "2025-02-15", 10),
("Aventure Amazonienne", "Immersion dans la forêt tropicale", "Brésil", 2000, "2024-09-01", "2024-09-10", 15),
("Découverte des pyramides", "Plongée dans l'histoire antique", "Égypte", 800, "2024-11-01", "2024-11-10", 25);



INSERT INTO client (nom, prenom, email, telephone, adresse, date_naissance) 
VALUES 
("Omar", "BENALI", "omar.benali@gmail.com", "0678542136", "Casablanca, 12 Rue des Fleurs", "1995-07-12"),
("Sara", "LOUATI", "sara.louati@yahoo.com", "0623347852", "Rabat, 45 Avenue Mohamed V", "2000-03-15"),
("Karim", "ELHAJ", "karim.elhaj@hotmail.com", "0689451230", "Marrakech, Lotissement Palmeraie", "1988-11-22"),
("Yasmine", "ABIDI", "yasmine.abidi@gmail.com", "0698541200", "Fès, 78 Rue Al Batha", "1992-09-30"),
("Hassan", "NOUAMI", "hassan.nouami@gmail.com", "0632145987", "Tanger, Quartier Malabata", "1985-01-05");



INSERT INTO reservation (id_client, id_activite, date_reservation, statut) 
VALUES 
(1, 1, "2024-12-08", 'Confirmée'),
(2, 2, "2024-12-09", 'En attente'),
(3, 3, "2024-12-10", 'Confirmée'),
(4, 4, "2024-12-11", 'Annulée'),
(5, 1, "2024-12-12", 'Confirmée');


select r.id_reservation , c.nom ,  c.prenom , a.titre , r.statut , r.montant , r.date_reservation  from reservation r  inner join client c on r.id_client = c.id_client inner join activite a on a.id_activite = r.id_activite

### Mise à jour : Modifier les détails d’une Activité. 
UPDATE client SET nom = "Ines", telephone = "0600000" WHERE id_client=1;

UPDATE activite
SET titre = "Voyage au Paradis", prix=20000
WHERE id_activite =1 ;

### Suppression : Supprimer une réservation. 

delete from reservation where id_client = 1  ; 

### Écrire une requête de jointure entre les tables (ex. récupérer les détails des activités réservés par un client).
SELECT a.* from activite as a
INNER join reservation as r
on a.id_activite = r.id_activite
INNER JOIN client as c 
on c.id_client = r.id_client
where c.nom = "Omar"



select r.id_reservation ,a.titre ,  c.nom  , c.prenom , r.statut ,r.date_reservation   from reservation as r  
inner join activite as a  on a.id_activite = r.id_activite 
inner join  client as c  on c.id_client = r.id_client