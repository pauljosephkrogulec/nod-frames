CREATE TRIGGER newUser
AFTER INSERT ON Users
BEGIN
    INSERT INTO Bloc_notes(id_user) VALUES (NEW.id_user);
    INSERT INTO Logs(id_user, action) VALUES (NEW.id_user, 's''est enregisté(e) !');
END;