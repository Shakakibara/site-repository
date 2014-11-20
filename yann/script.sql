/*==============================================================*/
/* Nom de SGBD :  PostgreSQL 8                                  */
/* Date de création :  24/10/2014 10:32:11                      */
/*==============================================================*/


drop index if exists AFFILIATE_FK cascade;

drop index if exists AFFILIATE2_FK cascade;

drop index if exists AFFILIATE_PK cascade;

drop table if exists AFFILIATE cascade;

drop index if exists CIVILITIES_PK cascade;

drop table if exists CIVILITIES cascade;

drop index if exists OWN_FK cascade;

drop index if exists COMMENTS_PK cascade;

drop table if exists COMMENTS cascade;

drop index if exists CONTAIN_FK cascade;

drop index if exists CONTENTS_PK cascade;

drop table if exists CONTENTS cascade;

drop index if exists INCLUDE_FK cascade;

drop index if exists INCLUDE2_FK cascade;

drop index if exists INCLUDE_PK cascade;

drop table if exists INCLUDE cascade;

drop index if exists LOCATIONS_PK cascade;

drop table if exists LOCATIONS cascade;

drop index if exists MEDIAS_PK cascade;

drop table if exists MEDIAS cascade;

drop index if exists NEWSLETTERMAILS_PK cascade;

drop table if exists NEWSLETTERMAILS cascade;

drop index if exists NEWSLETTERS_PK cascade;

drop table if exists NEWSLETTERS cascade;

drop index if exists CREATE_FK cascade;

drop index if exists PAGES_PK cascade;

drop table if exists PAGES cascade;

drop index if exists SEND_FK cascade;

drop index if exists SEND2_FK cascade;

drop index if exists SEND_PK cascade;

drop table if exists SEND cascade;

drop index if exists USERCATEGORIES_PK cascade;

drop table if exists USERCATEGORIES cascade;

drop index if exists IS_FK cascade;

drop index if exists USERS_PK cascade;

drop table if exists USERS cascade;

drop index if exists WATERPOINTS_PK cascade;

drop table if exists WATERPOINTS cascade;

/*==============================================================*/
/* Table : AFFILIATE                                            */
/*==============================================================*/
create table AFFILIATE (
   WATERPOINT_ID        INT4                 not null,
   MEDIA_ID             INT4                 not null,
   constraint PK_AFFILIATE primary key (WATERPOINT_ID, MEDIA_ID)
);

/*==============================================================*/
/* Index : AFFILIATE_PK                                         */
/*==============================================================*/
create unique index AFFILIATE_PK on AFFILIATE (
WATERPOINT_ID,
MEDIA_ID
);

/*==============================================================*/
/* Index : AFFILIATE2_FK                                        */
/*==============================================================*/
create  index AFFILIATE2_FK on AFFILIATE (
WATERPOINT_ID
);

/*==============================================================*/
/* Index : AFFILIATE_FK                                         */
/*==============================================================*/
create  index AFFILIATE_FK on AFFILIATE (
MEDIA_ID
);

/*==============================================================*/
/* Table : CIVILITIES                                           */
/*==============================================================*/
create table CIVILITIES (
   ID                   SERIAL                 not null,
   LABEL                VARCHAR(3)           not null,
   constraint PK_CIVILITIES primary key (ID),
   constraint AK_LABEL_CIVILITI unique (LABEL)
);

/*==============================================================*/
/* Index : CIVILITIES_PK                                        */
/*==============================================================*/
create unique index CIVILITIES_PK on CIVILITIES (
ID
);

/*==============================================================*/
/* Table : COMMENTS                                             */
/*==============================================================*/
create table COMMENTS (
   ID                   SERIAL               not null,
   USER_ID              INT4                 not null,
   CONTENT_ID           INT4                 not null,
   CONTENT              TEXT                 not null,
   CREATED              DATE                 not null default CURRENT_TIMESTAMP,
   UPDATED              DATE                 null default NULL,
   constraint PK_COMMENTS primary key (ID)
);

/*==============================================================*/
/* Index : COMMENTS_PK                                          */
/*==============================================================*/
create unique index COMMENTS_PK on COMMENTS (
ID
);

/*==============================================================*/
/* Index : OWN_FK                                               */
/*==============================================================*/
create  index OWN_FK on COMMENTS (
CONTENT_ID
);

/*==============================================================*/
/* Table : CONTENTS                                             */
/*==============================================================*/
create table CONTENTS (
   ID                   SERIAL               not null,
   USER_ID              INT4                 not null,
   PAGE_ID              INT4                 not null,
   TITLE                VARCHAR(50)          not null,
   CONTENT              TEXT                 not null,
   LIKENB               INT4                 not null default 0
      constraint CKC_LIKENB_CONTENTS check (LIKENB >= 0),
   DISLIKENB            INT4                 not null default 0
      constraint CKC_DISLIKENB_CONTENTS check (DISLIKENB >= 0),
   CREATED              DATE                 not null default CURRENT_TIMESTAMP,
   UPDATED              DATE                 null default NULL,
   constraint PK_CONTENTS primary key (ID)
);

/*==============================================================*/
/* Index : CONTENTS_PK                                          */
/*==============================================================*/
create unique index CONTENTS_PK on CONTENTS (
ID
);

/*==============================================================*/
/* Index : CONTAIN_FK                                           */
/*==============================================================*/
create  index CONTAIN_FK on CONTENTS (
PAGE_ID
);

/*==============================================================*/
/* Table : INCLUDE                                              */
/*==============================================================*/
create table INCLUDE (
   CONTENT_ID           INT4                 not null,
   MEDIA_ID             INT4                 not null,
   constraint PK_INCLUDE primary key (CONTENT_ID, MEDIA_ID)
);

/*==============================================================*/
/* Index : INCLUDE_PK                                           */
/*==============================================================*/
create unique index INCLUDE_PK on INCLUDE (
CONTENT_ID,
MEDIA_ID
);

/*==============================================================*/
/* Index : INCLUDE2_FK                                          */
/*==============================================================*/
create  index INCLUDE2_FK on INCLUDE (
CONTENT_ID
);

/*==============================================================*/
/* Index : INCLUDE_FK                                           */
/*==============================================================*/
create  index INCLUDE_FK on INCLUDE (
MEDIA_ID
);

/*==============================================================*/
/* Table : LOCATIONS                                            */
/*==============================================================*/
create table LOCATIONS (
   ID                   SERIAL               not null,
   X                    FLOAT8               not null,
   Y                    FLOAT8               not null,
   constraint PK_LOCATIONS primary key (ID)
);

/*==============================================================*/
/* Index : LOCATIONS_PK                                         */
/*==============================================================*/
create unique index LOCATIONS_PK on LOCATIONS (
ID
);

/*==============================================================*/
/* Table : MEDIAS                                               */
/*==============================================================*/
create table MEDIAS (
   ID                   SERIAL               not null,
   URL                  VARCHAR(255)         not null,
   NAME                 VARCHAR(50)          not null,
   constraint PK_MEDIAS primary key (ID),
   constraint AK_NAME_MEDIAS unique (NAME)
);

/*==============================================================*/
/* Index : MEDIAS_PK                                            */
/*==============================================================*/
create unique index MEDIAS_PK on MEDIAS (
ID
);

/*==============================================================*/
/* Table : NEWSLETTERMAILS                                      */
/*==============================================================*/
create table NEWSLETTERMAILS (
   MAIL                 VARCHAR(50)          not null,
   constraint PK_NEWSLETTERMAILS primary key (MAIL)
);

/*==============================================================*/
/* Index : NEWSLETTERMAILS_PK                                   */
/*==============================================================*/
create unique index NEWSLETTERMAILS_PK on NEWSLETTERMAILS (
MAIL
);

/*==============================================================*/
/* Table : NEWSLETTERS                                          */
/*==============================================================*/
create table NEWSLETTERS (
   ID                   SERIAL               not null,
   CONTENT              TEXT                 not null,
   CREATED              DATE                 not null default CURRENT_TIMESTAMP,
   constraint PK_NEWSLETTERS primary key (ID)
);

/*==============================================================*/
/* Index : NEWSLETTERS_PK                                       */
/*==============================================================*/
create unique index NEWSLETTERS_PK on NEWSLETTERS (
ID
);

/*==============================================================*/
/* Table : PAGES                                                */
/*==============================================================*/
create table PAGES (
   ID                   SERIAL               not null,
   USER_ID              INT4                 not null,
   NAME                 VARCHAR(50)          not null,
   CREATED              DATE                 not null,
   constraint PK_PAGES primary key (ID),
   constraint AK_NAME_PAGES unique (NAME)
);

/*==============================================================*/
/* Index : PAGES_PK                                             */
/*==============================================================*/
create unique index PAGES_PK on PAGES (
ID
);

/*==============================================================*/
/* Index : CREATE_FK                                            */
/*==============================================================*/
create  index CREATE_FK on PAGES (
USER_ID
);

/*==============================================================*/
/* Table : SEND                                                 */
/*==============================================================*/
create table SEND (
   NEWSLETTER_ID        INT4                 not null,
   MAIL                 VARCHAR(50)          not null,
   constraint PK_SEND primary key (NEWSLETTER_ID, MAIL)
);

/*==============================================================*/
/* Index : SEND_PK                                              */
/*==============================================================*/
create unique index SEND_PK on SEND (
NEWSLETTER_ID,
MAIL
);

/*==============================================================*/
/* Index : SEND2_FK                                             */
/*==============================================================*/
create  index SEND2_FK on SEND (
NEWSLETTER_ID
);

/*==============================================================*/
/* Index : SEND_FK                                              */
/*==============================================================*/
create  index SEND_FK on SEND (
MAIL
);

/*==============================================================*/
/* Table : USERCATEGORIES                                       */
/*==============================================================*/
create table USERCATEGORIES (
   ID                   SERIAL                 not null,
   LABEL                VARCHAR(30)          not null,
   constraint PK_USERCATEGORIES primary key (ID),
   constraint AK_LABEL_USERCATE unique (LABEL)
);

/*==============================================================*/
/* Index : USERCATEGORIES_PK                                    */
/*==============================================================*/
create unique index USERCATEGORIES_PK on USERCATEGORIES (
ID
);

/*==============================================================*/
/* Table : USERS                                                */
/*==============================================================*/
create table USERS (
   ID                   SERIAL               not null,
   CIVILITY_ID          INT4                 not null,
   USERCATEGORY_ID      INT4                 not null,
   MAIL                 VARCHAR(50)          not null,
   PSEUDO               VARCHAR(50)          not null,
   PASSWORD             VARCHAR(50)          not null,
   LASTNAME             VARCHAR(30)          not null,
   FIRSTNAME            VARCHAR(30)          not null,
   BIRTH                DATE                 not null,
   STREET               VARCHAR(50)          not null,
   ZIPCODE              CHAR(5)              not null,
   CITY                 VARCHAR(50)          not null,
   MAXWEEKLYPUB         INT4                 not null,
   CREATED              DATE                 not null default CURRENT_TIMESTAMP,
   constraint PK_USERS primary key (ID),
   constraint AK_MAIL_USERS unique (MAIL),
   constraint AK_PSEUDO_USERS unique (PSEUDO)
);

/*==============================================================*/
/* Index : USERS_PK                                             */
/*==============================================================*/
create unique index USERS_PK on USERS (
ID
);

/*==============================================================*/
/* Index : IS_FK                                                */
/*==============================================================*/
create  index IS_FK on USERS (
USERCATEGORY_ID
);

/*==============================================================*/
/* Table : WATERPOINTS                                          */
/*==============================================================*/
create table WATERPOINTS (
   ID                   SERIAL               not null,
   LOCATION_ID          INT4                 not null,
   NAME                 VARCHAR(100)         not null,
   constraint PK_WATERPOINTS primary key (ID),
   constraint AK_NAME_WATERPOI unique (NAME)
);

/*==============================================================*/
/* Index : WATERPOINTS_PK                                       */
/*==============================================================*/
create unique index WATERPOINTS_PK on WATERPOINTS (
ID
);

alter table AFFILIATE
   add constraint FK_AFFILIAT_AFFILIATE_MEDIAS foreign key (MEDIA_ID)
      references MEDIAS (ID)
      on delete restrict on update restrict;

alter table AFFILIATE
   add constraint FK_AFFILIAT_AFFILIATE_WATERPOI foreign key (WATERPOINT_ID)
      references WATERPOINTS (ID)
      on delete restrict on update restrict;

alter table COMMENTS
   add constraint FK_COMMENTS_OWN_CONTENTS foreign key (CONTENT_ID)
      references CONTENTS (ID)
      on delete restrict on update restrict;

alter table COMMENTS
   add constraint FK_COMMENTS_POST_USERS foreign key (USER_ID)
      references USERS (ID)
      on delete restrict on update restrict;

alter table CONTENTS
   add constraint FK_CONTENTS_CONTAIN_PAGES foreign key (PAGE_ID)
      references PAGES (ID)
      on delete restrict on update restrict;

alter table CONTENTS
   add constraint FK_CONTENTS_CREER2_USERS foreign key (USER_ID)
      references USERS (ID)
      on delete restrict on update restrict;

alter table INCLUDE
   add constraint FK_INCLUDE_INCLUDE_MEDIAS foreign key (MEDIA_ID)
      references MEDIAS (ID)
      on delete restrict on update restrict;

alter table INCLUDE
   add constraint FK_INCLUDE_INCLUDE2_CONTENTS foreign key (CONTENT_ID)
      references CONTENTS (ID)
      on delete restrict on update restrict;

alter table PAGES
   add constraint FK_PAGES_CREATE_USERS foreign key (USER_ID)
      references USERS (ID)
      on delete restrict on update restrict;

alter table SEND
   add constraint FK_SEND_SEND_NEWSLETT foreign key (MAIL)
      references NEWSLETTERMAILS (MAIL)
      on delete restrict on update restrict;

alter table SEND
   add constraint FK_SEND_SEND2_NEWSLETT foreign key (NEWSLETTER_ID)
      references NEWSLETTERS (ID)
      on delete restrict on update restrict;

alter table USERS
   add constraint FK_USERS_HAS_CIVILITI foreign key (CIVILITY_ID)
      references CIVILITIES (ID)
      on delete restrict on update restrict;

alter table USERS
   add constraint FK_USERS_IS_USERCATE foreign key (USERCATEGORY_ID)
      references USERCATEGORIES (ID)
      on delete restrict on update restrict;

alter table WATERPOINTS
   add constraint FK_WATERPOI_LOCATE_LOCATION foreign key (LOCATION_ID)
      references LOCATIONS (ID)
      on delete restrict on update restrict;

Insert into CIVILITIES (LABEL) values ('H');
Insert into CIVILITIES (LABEL) values ('F');

Insert into USERCATEGORIES (LABEL) values ('Administrateur');
Insert into USERCATEGORIES (LABEL) values ('Modérateur');
Insert into USERCATEGORIES (LABEL) values ('Abonné');


Insert into USERS (CIVILITY_ID, USERCATEGORY_ID, MAIL, PSEUDO, PASSWORD, LASTNAME, FIRSTNAME, BIRTH, STREET,ZIPCODE, CITY, MAXWEEKLYPUB) values (1, 1, 'yannhurry@hotmail.fr', 'hurryy', 'info', 'HURRY', 'Yann', '28/03/1994', '164 chemin du verney','74400', 'CHAMONIX', 1);