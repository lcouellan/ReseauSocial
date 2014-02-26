DROP DATABASE IF EXISTS reseau_social;

CREATE DATABASE IF NOT EXISTS reseau_social;
USE reseau_social;
# -----------------------------------------------------------------------------
#       TABLE : UTILISATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS UTILISATEUR
 (
   UTILISATEUR_ID BIGINT(4) NOT NULL  ,
   PHOTO_PROFIL_ID BIGINT(4) NULL  ,
   UTILISATEUR_NOM CHAR(32) NULL  ,
   UTILISATEUR_PRENOM CHAR(32) NULL  ,
   UTILISATEUR_MAIL CHAR(32) NULL  ,
   UTILISATEUR_MDP CHAR(255) NULL  ,
   ESTMODERATEUR SMALLINT NULL  
   , PRIMARY KEY (UTILISATEUR_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE UTILISATEUR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_UTILISATEUR_PHOTO
     ON UTILISATEUR (PHOTO_PROFIL_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : PHOTO
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PHOTO
 (
   PHOTO_ID BIGINT(4) NOT NULL  ,
   PHOTO_FICHIER CHAR(32) NULL  
   , PRIMARY KEY (PHOTO_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : RESEAU
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RESEAU
 (
   ID_RESEAU BIGINT(4) NOT NULL  ,
   LIBELLE CHAR(32) NULL  
   , PRIMARY KEY (ID_RESEAU) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CATEGORIEAMIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIEAMIS
 (
   ID_CATEGORIE BIGINT(4) NOT NULL  ,
   LIBELLE CHAR(32) NULL  
   , PRIMARY KEY (ID_CATEGORIE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : AVOIRPHOTO
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AVOIRPHOTO
 (
   UTILISATEUR_ID BIGINT(4) NOT NULL  ,
   PHOTO_ID BIGINT(4) NOT NULL  
   , PRIMARY KEY (UTILISATEUR_ID,PHOTO_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE AVOIRPHOTO
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_AVOIRPHOTO_UTILISATEUR
     ON AVOIRPHOTO (UTILISATEUR_ID ASC);

CREATE  INDEX I_FK_AVOIRPHOTO_PHOTO
     ON AVOIRPHOTO (PHOTO_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : MESSAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MESSAGE
 (
   EMMETEUR_ID BIGINT(4) NOT NULL  ,
   DESTINATAIRE_ID BIGINT(4) NOT NULL  ,
   MESSAGE_SUJET CHAR(32) NULL  ,
   MESSAGE CHAR(32) NULL  
   , PRIMARY KEY (EMMETEUR_ID,DESTINATAIRE_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MESSAGE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MESSAGE_UTILISATEUR
     ON MESSAGE (EMMETEUR_ID ASC);

CREATE  INDEX I_FK_MESSAGE_UTILISATEUR1
     ON MESSAGE (DESTINATAIRE_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : APPARTENIRGROUPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS APPARTENIRGROUPE
 (
   ID_CATEGORIE BIGINT(4) NOT NULL  ,
   UTILISATEUR_ID BIGINT(4) NOT NULL  
   , PRIMARY KEY (ID_CATEGORIE,UTILISATEUR_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE APPARTENIRGROUPE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_APPARTENIRGROUPE_CATEGORIEAMIS
     ON APPARTENIRGROUPE (ID_CATEGORIE ASC);

CREATE  INDEX I_FK_APPARTENIRGROUPE_UTILISATEUR
     ON APPARTENIRGROUPE (UTILISATEUR_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : AMIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AMIS
 (
   UTILISATEUR_ID BIGINT(4) NOT NULL  ,
   UTILISATEUR_ID_1 BIGINT(4) NOT NULL  ,
   ID_CATEGORIE BIGINT(4) NOT NULL  
   , PRIMARY KEY (UTILISATEUR_ID,UTILISATEUR_ID_1,ID_CATEGORIE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE AMIS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_AMIS_UTILISATEUR
     ON AMIS (UTILISATEUR_ID ASC);

CREATE  INDEX I_FK_AMIS_UTILISATEUR2
     ON AMIS (UTILISATEUR_ID_1 ASC);

CREATE  INDEX I_FK_AMIS_CATEGORIEAMIS
     ON AMIS (ID_CATEGORIE ASC);

# -----------------------------------------------------------------------------
#       TABLE : APPARTENIRRESEAU
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS APPARTENIRRESEAU
 (
   UTILISATEUR_ID BIGINT(4) NOT NULL  ,
   ID_RESEAU BIGINT(4) NOT NULL  
   , PRIMARY KEY (UTILISATEUR_ID,ID_RESEAU) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE APPARTENIRRESEAU
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_APPARTENIRRESEAU_UTILISATEUR
     ON APPARTENIRRESEAU (UTILISATEUR_ID ASC);

CREATE  INDEX I_FK_APPARTENIRRESEAU_RESEAU
     ON APPARTENIRRESEAU (ID_RESEAU ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE UTILISATEUR 
  ADD FOREIGN KEY FK_UTILISATEUR_PHOTO (PHOTO_PROFIL_ID)
      REFERENCES PHOTO (PHOTO_ID) ;


ALTER TABLE AVOIRPHOTO 
  ADD FOREIGN KEY FK_AVOIRPHOTO_UTILISATEUR (UTILISATEUR_ID)
      REFERENCES UTILISATEUR (UTILISATEUR_ID) ;


ALTER TABLE AVOIRPHOTO 
  ADD FOREIGN KEY FK_AVOIRPHOTO_PHOTO (PHOTO_ID)
      REFERENCES PHOTO (PHOTO_ID) ;


ALTER TABLE MESSAGE 
  ADD FOREIGN KEY FK_MESSAGE_UTILISATEUR (EMMETEUR_ID)
      REFERENCES UTILISATEUR (UTILISATEUR_ID) ;


ALTER TABLE MESSAGE 
  ADD FOREIGN KEY FK_MESSAGE_UTILISATEUR1 (DESTINATAIRE_ID)
      REFERENCES UTILISATEUR (UTILISATEUR_ID) ;


ALTER TABLE APPARTENIRGROUPE 
  ADD FOREIGN KEY FK_APPARTENIRGROUPE_CATEGORIEAMIS (ID_CATEGORIE)
      REFERENCES CATEGORIEAMIS (ID_CATEGORIE) ;


ALTER TABLE APPARTENIRGROUPE 
  ADD FOREIGN KEY FK_APPARTENIRGROUPE_UTILISATEUR (UTILISATEUR_ID)
      REFERENCES UTILISATEUR (UTILISATEUR_ID) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_UTILISATEUR (UTILISATEUR_ID)
      REFERENCES UTILISATEUR (UTILISATEUR_ID) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_UTILISATEUR2 (UTILISATEUR_ID_1)
      REFERENCES UTILISATEUR (UTILISATEUR_ID) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_CATEGORIEAMIS (ID_CATEGORIE)
      REFERENCES CATEGORIEAMIS (ID_CATEGORIE) ;


ALTER TABLE APPARTENIRRESEAU 
  ADD FOREIGN KEY FK_APPARTENIRRESEAU_UTILISATEUR (UTILISATEUR_ID)
      REFERENCES UTILISATEUR (UTILISATEUR_ID) ;


ALTER TABLE APPARTENIRRESEAU 
  ADD FOREIGN KEY FK_APPARTENIRRESEAU_RESEAU (ID_RESEAU)
      REFERENCES RESEAU (ID_RESEAU) ;

