<?php 
    require_once('./config.php');
    if(!isOnline()) {
        header('Location: ./login.php');
    }
    $cadre = $bdd->query('SELECT * FROM Cadre LIMIT 0,1');
    $bgi = $cadre->fetch()['image_de_fond'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style='background-image: url(asset/img/<?php echo $bgi ?>);background-repeat: no-repeat;background-size: cover;'>
<div class="users">
    <?php 
        $options = array();
        $avoir = $bdd->query('SELECT o.* FROM Avoir INNER JOIN Options o USING(id_option) WHERE id_user='.$_SESSION['id_user']);
        while($row = $avoir->fetch()) $options[$row['nom_app']] = $row['id_option'];
        


    ?>
</div>
</body>
</html>