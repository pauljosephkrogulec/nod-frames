<?php 
    include_once('header.php');
    if(isset($_POST['Valide'])){
        $uBloc = $bdd->query('UPDATE Bloc_notes SET contenu="'.$_POST['bloc'] .'" WHERE id_user='.$_SESSION['id_user']);  
        $log = $bdd->prepare('INSERT INTO Logs(id_user, action, date) VALUES (?,?,?)');
        $log->execute(array($_SESSION['id_user'],'a modifié son bloc notes', $currentDateTime));
    }
    $blocs = $bdd->query("SELECT * FROM Bloc_notes WHERE id_user=".$_SESSION['id_user']);
    $b = $blocs->fetch();
?>

<div class="body"> 
    <form action="" method="post">
    <textarea class="bloc" name="bloc" required><?= $b['contenu']?></textarea>
    <input type="submit" name="Valide" value="Enregistré">
    </form>
</div>