<?php 
    include_once('header.php');
    $bgi = $bdd->query('SELECT * FROM Photo');
    if(isset($_GET['name_image'])){
        $change = $bdd->prepare('UPDATE Users SET image_de_fond=? WHERE id_user=?');
        $change->execute(array($_GET['name_image'],$_SESSION['id_user']));
        $image = $bdd->prepare('INSERT INTO Logs(id_user, action, date) VALUES (?,?,?)');
        $image->execute(array($_SESSION['id_user'],'a modifié son image de fond', $currentDateTime));
        header('location: ./Galerie.php');
    }
?>

<div style="padding-left: 20%;overflow:scroll;max-height:80%;">
    <div class="row">
        <?php 
            $i = 1;
            while ($row = $bgi->fetch()){
                echo '<div class="col-sm-4 card" style="background-color: white;">
                        <a href="?name_image='.$row['name_image'].'"><img src="./assets/img/'.$row['name_image'].'"></a>
                        </div>';
                if($i%3==0) echo '</div><div class="row">';
                $i++;
            }
        ?>
    </div>
</div>