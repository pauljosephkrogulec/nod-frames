<?php 
    require_once('./config.php');
    $msg_error='';
    if(isOnline()) {
        setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
        $currentDateTime = date('d/m/Y H:i:s');
        $log = $bdd->prepare('INSERT INTO Logs(id_user, action, date) VALUES (?,?,?)');
        $log->execute(array($_SESSION['id_user'],'S\'est connecter', $currentDateTime));
        header('Location: ./header.php');
    }
    if(isset($_POST['mylogin'])) {
        $user = $bdd->prepare('SELECT * FROM Users WHERE username=? AND code_secret=?');
        $user->execute(array($_POST['identifiant'],$_POST['mdp']));
        $userVerif = $user->fetch();
        if($userVerif){
            $_SESSION['id_user'] = $userVerif['id_user'];
            $_SESSION['username'] = $userVerif['username'];
            $_SESSION['token'] = $userVerif['token'];
            $_SESSION['id_phone'] = $userVerif['id_phone'];
            $_SESSION['code_secret'] = $userVerif['code_secret'];
            $_SESSION['mode_enfant'] = $userVerif['mode_enfant'];
            $_SESSION['last_connexion'] = $userVerif['last_connexion'];
            $_SESSION['image_de_fond'] = $userVerif['image_de_fond'];

            setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
            $currentDateTime = date('d/m/Y H:i:s');
            $log = $bdd->prepare('INSERT INTO Logs(id_user, action, date) VALUES (?,?,?)');
            $log->execute(array($_SESSION['id_user'],'S\'est connecter',$currentDateTime));
            header('Location: ./header.php');
        } else {
            $msg_error = 'Identifiant ou Mot de passe invalide ! 2';
        }
    } else {
        $msg_error = 'Identifiant ou Mot de passe invalide !';
    }

?>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <meta property="og:type" content="website">
    <meta name="author" content="Carpentier Quentin & Krogulec Paul-Joseph">
</head>
<body>
    <div class="wrapper">
        <div class="content login">
            <h2>Service d'Authentification</h2>
            <form method="post" action="">
                <label for="identifiant">Identifiant</label>
                <input type="text" name="identifiant" required>
                <label for="mdp">Code Secret</label>
                <input type="password" name="mdp" required>
                <input class="btn btn-primary" type="submit" name="mylogin" value="Connexion">
            </form>
            <span><?= $msg_error; ?></span>
        </div>
    </div>
</body>
</html>