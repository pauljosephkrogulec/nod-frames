/* Table du Cadre.
    -- id_cadre : l'id du cadre.
    -- id_admin : l'id de l'utilisateur principal
    -- nb_users : le nombre d'utilisateurs enregistrés.
    -- image_de_fond : l'image de fond du cadre.
*/
DROP TABLE IF EXISTS Cadre;
CREATE TABLE Cadre (
    id_cadre INTEGER PRIMARY KEY AUTOINCREMENT,
    id_admin INTEGER DEFAULT NULL,
    image_de_fond text NOT NULL DEFAULT 'wallpaper_default.png',
    CONSTRAINT admin_fk FOREIGN KEY (id_admin) REFERENCES Users(id_user) ON DELETE CASCADE
);

/* Table des utilisateurs.
    -- id_user : l'id de l'utilisateur (clé primaire).
    -- username : le nom/prénom de l'utilisateur.
    -- code_secret : le code pour dévérouiller son compte et se relier à l'application.
    -- mode_enfant : si c'est un enfant ou non
*/
DROP TABLE IF EXISTS Users;
CREATE TABLE Users(id_user INTEGER PRIMARY KEY AUTOINCREMENT, username varchar(40) NOT NULL, token varchar(255) DEFAULT NULL, id_phone varchar(60) NOT NULL, code_secret INTEGER(6) CHECK(code_secret >= 999) DEFAULT 1234, mode_enfant boolean DEFAULT false, last_connexion date, image_de_fond text NOT NULL DEFAULT 'wallpaper_default.png');

/* Table du bloc_note.
    -- id_option : l'id de l'utilisateur (clé primaire).
    -- nom_app : le nom de l'option (Température, Bloc_note, ...)
*/
DROP TABLE IF EXISTS Options;
CREATE TABLE Options (
    id_option INTEGER PRIMARY KEY AUTOINCREMENT,
    nom_app varchar(30) NOT NULL
);

/* Table du bloc_note.
    -- id_bloc : l'id du bloc_note (clé primaire).
    -- contenu : contenu du bloc_note.
*/
DROP TABLE IF EXISTS Bloc_notes;
CREATE TABLE Bloc_notes (
    id_bloc INTEGER PRIMARY KEY AUTOINCREMENT,
    id_user INTEGER,
    contenu text(1024) DEFAULT NULL,
    CONSTRAINT user_fk FOREIGN KEY (id_user) REFERENCES Users(id_user) ON DELETE CASCADE
);

/* Table des logs (historique des actions).
    -- id_log : l'id du log (clé primaire).
    -- user_id : l'id de l'utilisateur qui fait l'action.
    (clée étrangère vers l'id de l'utilisateur en question')
    -- action : courte description de l'action.
    -- date : la date de l'action.
*/
DROP TABLE IF EXISTS Logs;
CREATE TABLE Logs (
    id_log INTEGER PRIMARY KEY AUTOINCREMENT,
    id_user INTEGER,
    action text,
    date time NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT user_fk FOREIGN KEY (id_user) REFERENCES Users(id_user) ON DELETE CASCADE
);

/* Association entre le cadre et l'utilisateur.
    -- id_cadre : l'id du cadre (clé primaire).
    -- id_option : l'id de l'utilisateur (clé primaire).
    (clés étrangères associant l'id du cadre avec la table Cadre et l'id de l'utilisateur à la table Users).
*/
DROP TABLE IF EXISTS Connecter;
CREATE TABLE Connecter (
    id_cadre INTEGER REFERENCES Cadre(id_cadre) ON DELETE CASCADE,
    id_user INTEGER REFERENCES Users(id_user) ON DELETE CASCADE,
    CONSTRAINT gerer_pk PRIMARY KEY (id_cadre, id_user)
);

/* Association entre les utilisateurs et les options.
    -- id_user : l'id de l'utilisateur (clé primaire).
    -- id_option : l'id de l'option (clé primaire).
    (clés étrangères associant l'id de l'utilisateur avec la table Users et l'id de l'option à la table Options).
*/
DROP TABLE IF EXISTS Avoir;
CREATE TABLE Avoir (
    id_user INTEGER REFERENCES Users(id_user) ON DELETE CASCADE,
    id_option INTEGER REFERENCES Options(id_option) ON DELETE CASCADE,
    CONSTRAINT avoir_pk PRIMARY KEY (id_user, id_option)
);


DROP TABLE IF EXISTS Photo;
CREATE TABLE Photo (
    id_image INTEGER PRIMARY KEY AUTOINCREMENT,
    name_image varchar text NOT NULL
);