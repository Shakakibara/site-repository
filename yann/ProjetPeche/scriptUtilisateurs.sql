/*==============================================================*/
/* Nom de SGBD :  PostgreSQL 8                                  */
/* Date de création :  15/10/2014 09:33:15                      */
/* Date de modification :  15/10/2014 09:35:15                  */
/*==============================================================*/

/*
drop index EST_AFFILIE_FK;

drop index EST_AFFILIE2_FK;

drop index EST_AFFILIE_PK;

drop table AFFILIATION;

drop index CATEGORIE_UTILISATEUR_PK;

drop table CATEGORIE_UTILISATEUR;

drop index CIVILITE_PK;

drop table CIVILITE;

drop index POSSEDE_FK;

drop index PUBLIE_FK;

drop index COMMENTAIRE_PK;

drop table COMMENTAIRE;

drop index CONTIENT_FK;

drop index CREER2_FK;

drop index CONTENU_PK;

drop table CONTENU;

drop index CREER_FK;

drop index CREER3_FK;

drop index CREER_PK;

drop table CREATION;

drop index ENVOYER_FK;

drop index ENVOYER2_FK;

drop index ENVOYER_PK;

drop table ENVOIE;

drop index CONTIENT2_FK;

drop index CONTIENT3_FK;

drop index CONTIENT2_PK;

drop table INCLUSION;

drop index LOCALISATION_PK;

drop table LOCALISATION;

drop index MAILNEWSLETTER_PK;

drop table MAILNEWSLETTER;

drop index MEDIAS_PK;

drop table MEDIAS;

drop index NEWSLETTER_PK;

drop table NEWSLETTER;

drop index PAGE_PK;

drop table PAGE;

drop index SE_SITUER_FK;

drop index POINT_D_EAU_PK;

drop table POINT_EAU;

drop index EST_UN_FK;

drop index DETIENT_FK;

drop index UTILISATEUR_PK;

drop table UTILISATEUR;*/

/*==============================================================*/
/* Table : AFFILIATION                                          */
/*==============================================================*/
create table AFFILIATION (
   IDPOINTEAU           INT4                 not null,
   IDMEDIA              INT4                 not null,
   constraint PK_AFFILIATION primary key (IDPOINTEAU, IDMEDIA)
);

/*==============================================================*/
/* Index : EST_AFFILIE_PK                                       */
/*==============================================================*/
create unique index EST_AFFILIE_PK on AFFILIATION (
IDPOINTEAU,
IDMEDIA
);

/*==============================================================*/
/* Index : EST_AFFILIE2_FK                                      */
/*==============================================================*/
create  index EST_AFFILIE2_FK on AFFILIATION (
IDPOINTEAU
);

/*==============================================================*/
/* Index : EST_AFFILIE_FK                                       */
/*==============================================================*/
create  index EST_AFFILIE_FK on AFFILIATION (
IDMEDIA
);

/*==============================================================*/
/* Table : CATEGORIE_UTILISATEUR                                */
/*==============================================================*/
create table CATEGORIE_UTILISATEUR (
   IDCATEGORIEUTILISATEUR INT4                 not null,
   LIBELLECATEGORIEUTILISATEUR VARCHAR(30)          not null,
   constraint PK_CATEGORIE_UTILISATEUR primary key (IDCATEGORIEUTILISATEUR)
);

/*==============================================================*/
/* Index : CATEGORIE_UTILISATEUR_PK                             */
/*==============================================================*/
create unique index CATEGORIE_UTILISATEUR_PK on CATEGORIE_UTILISATEUR (
IDCATEGORIEUTILISATEUR
);

/*==============================================================*/
/* Table : CIVILITE                                             */
/*==============================================================*/
create table CIVILITE (
   IDCIVILITE           INT4                 not null,
   LIBELLECIVILITE      VARCHAR(3)           not null,
   constraint PK_CIVILITE primary key (IDCIVILITE)
);

/*==============================================================*/
/* Index : CIVILITE_PK                                          */
/*==============================================================*/
create unique index CIVILITE_PK on CIVILITE (
IDCIVILITE
);

/*==============================================================*/
/* Table : COMMENTAIRE                                          */
/*==============================================================*/
create table COMMENTAIRE (
   IDCOMMENTAIRE        SERIAL               not null,
   IDUTILISATEUR        INT4                 not null,
   IDCONTENU            INT4                 not null,
   TEXTECOMMENTAIRE     TEXT                 not null,
   DATEAJOUTCOMMENTAIRE TIMESTAMP            not null default CURRENT_TIMESTAMP,
   DATEMODIFCOMMENTAIRE TIMESTAMP            null default NULL,
   constraint PK_COMMENTAIRE primary key (IDCOMMENTAIRE)
);

/*==============================================================*/
/* Index : COMMENTAIRE_PK                                       */
/*==============================================================*/
create unique index COMMENTAIRE_PK on COMMENTAIRE (
IDCOMMENTAIRE
);

/*==============================================================*/
/* Index : PUBLIE_FK                                            */
/*==============================================================*/
create  index PUBLIE_FK on COMMENTAIRE (
IDUTILISATEUR
);

/*==============================================================*/
/* Index : POSSEDE_FK                                           */
/*==============================================================*/
create  index POSSEDE_FK on COMMENTAIRE (
IDCONTENU
);

/*==============================================================*/
/* Table : CONTENU                                              */
/*==============================================================*/
create table CONTENU (
   IDCONTENU            SERIAL               not null,
   IDUTILISATEUR        INT4                 not null,
   IDPAGE               INT4                 not null,
   TITRECONENU          VARCHAR(50)          not null,
   TEXTECONTENU         TEXT                 not null,
   NBLIKE               INT4                 not null default 0
      constraint CKC_NBLIKE_CONTENU check (NBLIKE >= 0),
   NBDISLIKE            INT4                 not null default 0
      constraint CKC_NBDISLIKE_CONTENU check (NBDISLIKE >= 0),
   DATEAJOUTCONTENU     TIMESTAMP            not null default CURRENT_TIMESTAMP,
   DATEMODIFICATIONCONTENU TIMESTAMP            null default NULL,
   constraint PK_CONTENU primary key (IDCONTENU)
);

comment on table CONTENU is
'Contenu = Vidéo, Image, Article
';

/*==============================================================*/
/* Index : CONTENU_PK                                           */
/*==============================================================*/
create unique index CONTENU_PK on CONTENU (
IDCONTENU
);

/*==============================================================*/
/* Index : CREER2_FK                                            */
/*==============================================================*/
create  index CREER2_FK on CONTENU (
IDUTILISATEUR
);

/*==============================================================*/
/* Index : CONTIENT_FK                                          */
/*==============================================================*/
create  index CONTIENT_FK on CONTENU (
IDPAGE
);

/*==============================================================*/
/* Table : CREATION                                             */
/*==============================================================*/
create table CREATION (
   IDPAGE               INT4                 not null,
   IDUTILISATEUR        INT4                 not null,
   constraint PK_CREATION primary key (IDPAGE, IDUTILISATEUR)
);

comment on table CREATION is
'Seul un admin peut réaliser cette action';

/*==============================================================*/
/* Index : CREER_PK                                             */
/*==============================================================*/
create unique index CREER_PK on CREATION (
IDPAGE,
IDUTILISATEUR
);

/*==============================================================*/
/* Index : CREER3_FK                                            */
/*==============================================================*/
create  index CREER3_FK on CREATION (
IDPAGE
);

/*==============================================================*/
/* Index : CREER_FK                                             */
/*==============================================================*/
create  index CREER_FK on CREATION (
IDUTILISATEUR
);

/*==============================================================*/
/* Table : ENVOIE                                               */
/*==============================================================*/
create table ENVOIE (
   IDNEWSLETTER         INT4                 not null,
   MAILNEWSLETTER       VARCHAR(50)          not null,
   constraint PK_ENVOIE primary key (IDNEWSLETTER, MAILNEWSLETTER)
);

/*==============================================================*/
/* Index : ENVOYER_PK                                           */
/*==============================================================*/
create unique index ENVOYER_PK on ENVOIE (
IDNEWSLETTER,
MAILNEWSLETTER
);

/*==============================================================*/
/* Index : ENVOYER2_FK                                          */
/*==============================================================*/
create  index ENVOYER2_FK on ENVOIE (
IDNEWSLETTER
);

/*==============================================================*/
/* Index : ENVOYER_FK                                           */
/*==============================================================*/
create  index ENVOYER_FK on ENVOIE (
MAILNEWSLETTER
);

/*==============================================================*/
/* Table : INCLUSION                                            */
/*==============================================================*/
create table INCLUSION (
   IDCONTENU            INT4                 not null,
   IDMEDIA              INT4                 not null,
   constraint PK_INCLUSION primary key (IDCONTENU, IDMEDIA)
);

/*==============================================================*/
/* Index : CONTIENT2_PK                                         */
/*==============================================================*/
create unique index CONTIENT2_PK on INCLUSION (
IDCONTENU,
IDMEDIA
);

/*==============================================================*/
/* Index : CONTIENT3_FK                                         */
/*==============================================================*/
create  index CONTIENT3_FK on INCLUSION (
IDCONTENU
);

/*==============================================================*/
/* Index : CONTIENT2_FK                                         */
/*==============================================================*/
create  index CONTIENT2_FK on INCLUSION (
IDMEDIA
);

/*==============================================================*/
/* Table : LOCALISATION                                         */
/*==============================================================*/
create table LOCALISATION (
   IDLOCALISATION       SERIAL               not null,
   XLOCALISATION        FLOAT8               not null,
   YLOCALISATION        FLOAT8               not null,
   constraint PK_LOCALISATION primary key (IDLOCALISATION)
);

/*==============================================================*/
/* Index : LOCALISATION_PK                                      */
/*==============================================================*/
create unique index LOCALISATION_PK on LOCALISATION (
IDLOCALISATION
);

/*==============================================================*/
/* Table : MAILNEWSLETTER                                       */
/*==============================================================*/
create table MAILNEWSLETTER (
   MAILNEWSLETTER       VARCHAR(50)          not null,
   constraint PK_MAILNEWSLETTER primary key (MAILNEWSLETTER)
);

/*==============================================================*/
/* Index : MAILNEWSLETTER_PK                                    */
/*==============================================================*/
create unique index MAILNEWSLETTER_PK on MAILNEWSLETTER (
MAILNEWSLETTER
);

/*==============================================================*/
/* Table : MEDIAS                                               */
/*==============================================================*/
create table MEDIAS (
   IDMEDIA              SERIAL               not null,
   URLMEDIA             VARCHAR(255)         not null,
   constraint PK_MEDIAS primary key (IDMEDIA)
);

/*==============================================================*/
/* Index : MEDIAS_PK                                            */
/*==============================================================*/
create unique index MEDIAS_PK on MEDIAS (
IDMEDIA
);

/*==============================================================*/
/* Table : NEWSLETTER                                           */
/*==============================================================*/
create table NEWSLETTER (
   IDNEWSLETTER         SERIAL               not null,
   TEXTENEWSLETTER      TEXT                 not null,
   DATENEWSLETTER       TIMESTAMP            not null default CURRENT_TIMESTAMP,
   constraint PK_NEWSLETTER primary key (IDNEWSLETTER)
);

/*==============================================================*/
/* Index : NEWSLETTER_PK                                        */
/*==============================================================*/
create unique index NEWSLETTER_PK on NEWSLETTER (
IDNEWSLETTER
);

/*==============================================================*/
/* Table : PAGE                                                 */
/*==============================================================*/
create table PAGE (
   IDPAGE               SERIAL               not null,
   NOMPAGE              VARCHAR(50)          null,
   constraint PK_PAGE primary key (IDPAGE)
);

/*==============================================================*/
/* Index : PAGE_PK                                              */
/*==============================================================*/
create unique index PAGE_PK on PAGE (
IDPAGE
);

/*==============================================================*/
/* Table : POINT_EAU                                            */
/*==============================================================*/
create table POINT_EAU (
   IDPOINTEAU           SERIAL               not null,
   IDLOCALISATION       INT4                 not null,
   NOMPOINTEAU          VARCHAR(100)         not null,
   constraint PK_POINT_EAU primary key (IDPOINTEAU)
);

/*==============================================================*/
/* Index : POINT_D_EAU_PK                                       */
/*==============================================================*/
create unique index POINT_D_EAU_PK on POINT_EAU (
IDPOINTEAU
);

/*==============================================================*/
/* Index : SE_SITUER_FK                                         */
/*==============================================================*/
create  index SE_SITUER_FK on POINT_EAU (
IDLOCALISATION
);

/*==============================================================*/
/* Table : UTILISATEURS                                          */
/*==============================================================*/
create table UTILISATEURS (
   IDUTILISATEUR        SERIAL               not null,
   IDCIVILITE           INT4                 not null,
   IDCATEGORIEUTILISATEUR INT4                 not null,
   MAILUTILISATEUR      VARCHAR(50)          not null,
   MOTDEPASSEUTILISATEUR VARCHAR(50)          not null,
   NOMUTILISATEUR        VARCHAR(30)          not null,
   PRENOMUTILISATEUR    VARCHAR(30)          not null,
   DATENAISSANCEUTILISATEUR DATE                 not null,
   RUEUTILISATEUR       VARCHAR(50)          not null,
   CODEPOSTALUTILISATEUR CHAR(5)              not null,
   VILLEUTILISAEUR      VARCHAR(50)          not null,
   NBPUBLICATIONMAXSEMAINE INT4                 not null,
   DATEINSCRIPTIONUTILISATEUR TIMESTAMP            not null default CURRENT_TIMESTAMP,
   constraint PK_UTILISATEUR primary key (IDUTILISATEUR)
);

/*==============================================================*/
/* Index : UTILISATEUR_PK                                       */
/*==============================================================*/
create unique index UTILISATEUR_PK on UTILISATEURS (
IDUTILISATEUR
);

/*==============================================================*/
/* Index : DETIENT_FK                                           */
/*==============================================================*/
create  index DETIENT_FK on UTILISATEURS (
IDCIVILITE
);

/*==============================================================*/
/* Index : EST_UN_FK                                            */
/*==============================================================*/
create  index EST_UN_FK on UTILISATEURS (
IDCATEGORIEUTILISATEUR
);

alter table AFFILIATION
   add constraint FK_AFFILIAT_EST_AFFIL_MEDIAS foreign key (IDMEDIA)
      references MEDIAS (IDMEDIA)
      on delete restrict on update restrict;

alter table AFFILIATION
   add constraint FK_AFFILIAT_EST_AFFIL_POINT_EA foreign key (IDPOINTEAU)
      references POINT_EAU (IDPOINTEAU)
      on delete restrict on update restrict;

alter table COMMENTAIRE
   add constraint FK_COMMENTA_POSSEDE_CONTENU foreign key (IDCONTENU)
      references CONTENU (IDCONTENU)
      on delete restrict on update restrict;

alter table COMMENTAIRE
   add constraint FK_COMMENTA_PUBLIE_UTILISAT foreign key (IDUTILISATEUR)
      references UTILISATEURS (IDUTILISATEUR)
      on delete restrict on update restrict;

alter table CONTENU
   add constraint FK_CONTENU_CONTIENT_PAGE foreign key (IDPAGE)
      references PAGE (IDPAGE)
      on delete restrict on update restrict;

alter table CONTENU
   add constraint FK_CONTENU_CREER2_UTILISAT foreign key (IDUTILISATEUR)
      references UTILISATEURS (IDUTILISATEUR)
      on delete restrict on update restrict;

alter table CREATION
   add constraint FK_CREATION_CREER_UTILISAT foreign key (IDUTILISATEUR)
      references UTILISATEURS (IDUTILISATEUR)
      on delete restrict on update restrict;

alter table CREATION
   add constraint FK_CREATION_CREER3_PAGE foreign key (IDPAGE)
      references PAGE (IDPAGE)
      on delete restrict on update restrict;

alter table ENVOIE
   add constraint FK_ENVOIE_ENVOYER_MAILNEWS foreign key (MAILNEWSLETTER)
      references MAILNEWSLETTER (MAILNEWSLETTER)
      on delete restrict on update restrict;

alter table ENVOIE
   add constraint FK_ENVOIE_ENVOYER2_NEWSLETT foreign key (IDNEWSLETTER)
      references NEWSLETTER (IDNEWSLETTER)
      on delete restrict on update restrict;

alter table INCLUSION
   add constraint FK_INCLUSIO_CONTIENT2_MEDIAS foreign key (IDMEDIA)
      references MEDIAS (IDMEDIA)
      on delete restrict on update restrict;

alter table INCLUSION
   add constraint FK_INCLUSIO_CONTIENT3_CONTENU foreign key (IDCONTENU)
      references CONTENU (IDCONTENU)
      on delete restrict on update restrict;

alter table POINT_EAU
   add constraint FK_POINT_EA_SE_SITUER_LOCALISA foreign key (IDLOCALISATION)
      references LOCALISATION (IDLOCALISATION)
      on delete restrict on update restrict;

alter table UTILISATEURS
   add constraint FK_UTILISAT_DETIENT_CIVILITE foreign key (IDCIVILITE)
      references CIVILITE (IDCIVILITE)
      on delete restrict on update restrict;

alter table UTILISATEURS
   add constraint FK_UTILISAT_EST_UN_CATEGORI foreign key (IDCATEGORIEUTILISATEUR)
      references CATEGORIE_UTILISATEUR (IDCATEGORIEUTILISATEUR)
      on delete restrict on update restrict;



/*=========================================================*/
/*             INSERT INTO RAJOUTEE LE 15-10               */
/*=========================================================*/

INSERT INTO civilite (idcivilite,libellecivilite) values (0,'M');
INSERT INTO civilite (idcivilite,libellecivilite) values (1,'Mme');

INSERT INTO categorie_utilisateur (idcategorieutilisateur,libelleCategorieUtilisateur) values (0,'Administrateur');
INSERT INTO categorie_utilisateur (idcategorieutilisateur,libelleCategorieUtilisateur) values (1,'Modérateur');
INSERT INTO categorie_utilisateur (idcategorieutilisateur,libelleCategorieUtilisateur) values (2,'Utilisateur');
INSERT INTO categorie_utilisateur (idcategorieutilisateur,libelleCategorieUtilisateur) values (3,'Banni');

INSERT INTO utilisateurs (idutilisateur, idcivilite, idcategorieutilisateur, mailutilisateur, motdepasseutilisateur, nomutilisateur, prenomutilisateur, datenaissanceutilisateur, rueutilisateur, codepostalutilisateur, villeutilisaeur, nbpublicationmaxsemaine) values (0,0,0, 'bozond.info@gmail.com', 'info', 'BOZON', 'David', '1994-08-04', '15 Avenue du Stand', '74000', 'Annecy', 2147483647);