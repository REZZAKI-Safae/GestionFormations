drop database if exists gestion_formation;
create database if not exists gestion_formation;
use gestion_stag;

create table client(
    idClient int(4) auto_increment primary key,
    nom varchar(50),
    prenom varchar(50),
    dateNaissance Date,
    CIN varchar(10),
    civilite varchar(1),
    email varchar(255),
    Telephone int(10),
    adresse varchar(60),
    niveau varchar(8),
    photo varchar(100)
);

INSERT INTO client(nom,prenom,CIN,civilite,email,Telephone,adresse,niveau,photo,dateNaissance) VALUES
    ('SAADAOUI','MOHAMMED','CD3464','M','saadaouimohamed@gmail.com',0680986547,'Oued Fes 30000 Fes Maroc','Bac+3','	
0b7f4e9b-f59c-4024-9f06-b3dc12850ab7-1920-1080.jpg','2001-04-12'),
   ('Rezzaki','Safae','CD780030','F','rezzaki.safae@student.emi.ac.ma',0617688204,'N12 Rue 9 BLOC A','Bac+3','images (1).jpg'
    ,'2002-03-19'),
('Benizza','Amine','CD780045','M','Benizza.Amine@student.emi.ac.ma',0617688223,'N12 Rue 9 BLOC B','Bac+5','images (2).jpg','1997-03-30'),
('Bouray','Saif Eddine','CD457889','M','bouray.saifeddine@student.emi.ac.ma',0617688223,'N12 Rue 9 BLOC B','Bac+6'
'2020_Bon_Cadeau_Photographe_Lausanne_Studio_Photo-3_uxga.jpg','
1997-02-02'),
('FETTAH','Imad Eddine','U345621','M','fettah.imad@student.emi.ac.ma',0634526719,'Av.Zarktouni Résidence Al Yasmine N 34 Khouribga','Bac+3','images (3).jpg','2001-09-28');

create table formation(
    idFormation int(4) auto_increment primary key,
    nomFormation varchar(50),
    description varchar(400),
    image varchar(100)
);

INSERT INTO formation (nomFormation,description,image)  VALUES 
('Les technologies du Web',"comprendre les concepts des technologies du web connaître les infrastructures et les services de base d'internet découvrir les nouvelles technologies côté client et côté serveur connaître les nouvelles architectures et leur sécurité"
,'webcenter.jpg.png'),
("Conception d'architecture Web technologies","Ce cours de synthèse aborde l'état de l'art des technologies Web et de leurs implications sur les SI d'entreprise. Il apporte une synthèse complète, structurée et didactique des connaissances aujourd'hui indispensables en matière de conception d'architecture Web. Il analyse ses domaines d'application, évalue l'offre du marché, examine les démarches pratiques de mise en œuvre, en insistant sur les impacts technologiques, organisationnels et méthodologiques.",
'Capture d’écran 2022-07-29 022823.png'),
('HTML',"Cette formation vous permettra d'acquérir les notions essentielles du langage HTML et de ses différentes versions : HTML, XHTML, HTML5. Vous apprendrez à structurer des documents au moyen des principales balises, à les valider et à les rendre accessibles. OBJECTIFS PÉDAGOGIQUES : Construire une structure de document HTML accessible et valide Maîtriser les balises sémantiques Créer un tableau Créer la structure d'un formulaire simple Comprendre l'importance de l'accessibilité au travers des référentiels AccessiWeb et WCAG",'1200px-HTML5_logo_and_wordmark.svg.png'),
('XML',"Ces dernières années ont vu une forte progression de la popularité de XML, le standard du W3C pour l'écriture de documents structurés. A l'issue de cette formation, le participant aura une maîtrise complète de la syntaxe du langage XML Schema et des règles de modélisation permises par ce langage. OBJECTIFS PÉDAGOGIQUES : Maîtriser la structure d’un document XML Maîtriser la syntaxe du langage XML Schema Maîtriser la rédaction d’un DTD (Définition de Type de Document)",
'Capture d’écran 2022-07-29 023032.png'),
('Java',"Ce cours a un double objectif. D'une part, approfondir certains aspects avancés de Java (types génériques, annotations, programmation réflexive, chargement des classes). D'autre part, présenter un panorama synthétique des principales librairies concernant la gestion des threads, les communications via le réseau, l'administration et la supervision des applications. Ce cours insiste par ailleurs sur les techniques architecturales associées.",
'Capture d’écran 2022-07-29 023353.png'),
('Angular',"Développé par Google, AngularJS est un framework structurant et simplifiant le développement des applications riches côté client. Cette formation vous apportera la maîtrise des fonctionnalités clés du framework : filtres, contrôleurs, templates... Vous verrez également son intégration dans une architecture REST. OBJECTIFS PÉDAGOGIQUES : Développer des applications Web performantes avec AngularJS Maîtriser les fonctionnalités clés du framework (filtres, contrôleurs, routes, templates...) Intégrer AngularJS dans une architecture orientée REST Intégrer des tests automatisés",
'Capture d’écran 2022-07-29 023549.png');


create table utilisateur(
    iduser int(4) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),   -- admin ou visiteur
    etat int(1),        -- 1:activé 0:desactivé
    pwd varchar(255)
);

create table inscription(
    idInscription int(4) auto_increment primary key,
    idClient int(4),
    idFormation int(4),
    date DATE,
    duree varchar(10),
    paiement varchar(1)       -- P:payé N:nonPayé
);

    INSERT INTO inscription(idClient,idFormation,date,duree,paiement) VALUES (3,2,'20-07-2022','3 mois','N');

Alter table inscription add constraint 
    foreign key(idFormation) references formation(idFormation);
Alter table inscription add constraint 
    foreign key(idClient) references client(idClient);

INSERT INTO filiere(nomFiliere,niveau) VALUES
	('TSDI','TS'),
	('TSGE','TS'),
	('TGI','T'),
	('TSRI','TS'),
	('TCE','T');	
	
	
INSERT INTO utilisateur(login,email,role,etat,pwd) VALUES 
    ('admin','admin@gmail.com','ADMIN',1,md5('123')),
    ('user1','user1@gmail.com','VISITEUR',0,md5('123')),
    ('user2','user2@gmail.com','VISITEUR',1,md5('123'));	



select * from filiere;
select * from stagiaire;
select * from utilisateur;
