<?php require('views/view_begin.php'); ?>

<?php

    if($authorization==0) {
        echo"<h3>Vous n'avez pas le statut de contributeur</h3>";
        if($_COOKIE["validate"]==1){
            echo"<p>VMais vous pouvez le demander en cliquant <a href='?controller=myspace&action=ask' >ici</a>.</p>";
        }else if($_COOKIE["validate"]==0){
            echo "<p>Votre demande est en attente, elle sera traitée dans les meilleur délai par nos équipes.</p>";
        }else{
            echo "<p>Votre demande a été enregistrer. Le temps de traitement peut-être long...</p>";
        }
    }else{
        if(isset($contribution_sended)){
            ?>
            <script>
                alert('Contribution envoyée ! ');
            </script>
            <?php
        }
        
        ?>

        <form id=sendContribution action="?controller=myspace&action=sendContribution" method="post">
            <input type="text" name="lien" placeholder="http://www.example.com"/>
            <input type="submit" value="Envoyer ma contribution"/>
        </form>
        
        <?php
        if(count($contributions)>0){
            echo "<table id='contributions'>";
            echo "<tr><th>Lien</th><th>Validée ?</th></tr>";
            foreach ($contributions as $contrib) {
                echo "<td><th>".$contrib['lien']."</th>";
                if($contrib['accepted']==1){
                    echo "<th><img class='accepted' src='./contents/img/verified.png' alt='acceptée'></th></td>";
                }else{
                    echo "<th><img class='accepted' src='./contents/img/pending.png' alt='en attente...'></th></td>";
                }
            }
            echo "</table>";
        }else{
            echo "<h3>Pas encore de contributions</h3>";
        }
        
    }

?>

<?php require('views/view_end.php'); ?>