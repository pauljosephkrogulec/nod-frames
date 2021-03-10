<?php 
    include_once('header.php');
    $log = $bdd->query('SELECT * FROM Logs INNER JOIN Users Using(id_user)');
    
?>
<div class="body">
    <div class="logs w3-card w3-white">
        <?php 
            while($row = $log->fetch()){
                echo '<span>' . $row['username'] .' '. $row['action'] . ' ' . $row['date'] . '</span></br>';
            }
        ?>
      </div>
</div>

