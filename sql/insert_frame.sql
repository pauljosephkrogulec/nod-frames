INSERT INTO Users(id_user, username, id_phone, code_secret, mode_enfant, last_connexion) VALUES
(1, 'Quentin', 'ASUS_G84FRE', 2212, false, '2020-02-10 14:06:48'),
(2, 'PJ', 'SMPHONE_0178EX', 1234, false, '2020-02-11 15:44:12');

INSERT INTO Logs(id_log, id_user, action, date) VALUES 
(1, 1, 's''est enregisté(e) !', '2020-02-10 14:06:48'),
(2, 2, 's''est enregisté(e) !', '2020-02-11 15:44:12');

INSERT INTO Cadre(id_cadre, id_admin) VALUES
(1, 1);

INSERT INTO Options(id_option, nom_app) VALUES
(1, 'Agenda'),
(2, 'Alarmes'),
(3, 'Appeler'),
(4, 'Bloc-notes'),
(5, 'Galerie'),
(6, 'Historique'),
(7, 'Messagerie'),
(8, 'Température'),
(9, 'Paramètres');

INSERT INTO Bloc_notes(id_bloc, id_user, contenu) VALUES 
(1, 1, "Ceci est un est !"),
(2, 2, NULL);


