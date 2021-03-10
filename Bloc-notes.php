<?php 
    include_once('header.php');
    if(isset($_POST['Valide'])){
        $uBloc = $bdd->query('UPDATE Bloc_notes SET contenu="'.$_POST['bloc'] .'" WHERE id_user='.$_SESSION['id_user']);  
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