<?php 
    require_once('./config.php');
    if(!isOnline()) {
        header('Location: login.php');
    }
    $cadre = $bdd->query('SELECT * FROM Cadre LIMIT 0,1');
    $bgi = $cadre->fetch()['image_de_fond'];
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Main</title>
<?php 
    $options = array();
    if (!isset($_GET['admin'])){
        $avoir = $bdd->query('SELECT o.* FROM Avoir INNER JOIN Options o USING(id_option) WHERE id_user='.$_SESSION['id_user']);
    } else {
        $avoir = $bdd->query('SELECT o.* FROM Options o');
    }
    while($row = $avoir->fetch()) $options[$row['nom_app']] = $row['id_option'];
?>
<div class="w3-sidebar w3-bar-block w3-border-right" id="mySidebar">
    <?php 
        foreach ($options as $name => $value){
            echo '<a href="'.$name.'.php" class="w3-bar-item w3-button">'.$name.'</a>';
        }
    ?>
    <a href="logout.php" class="w3-bar-item w3-button">Deconnexion</a>

</div>

<div class="body">
    <?php
        setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
        $currentDateTime = date('d/m/Y H:i:s');
        echo '<h1 class="date-value"> '.$currentDateTime.'</h1>';
    ?>
</div>