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
        <div id="form_contrib">
        <h3>Envoyer une contribution : </h3>
        <form id=sendContribution action="?controller=myspace&action=sendContribution" method="post">
            <input class="input" type="text" name="lien" placeholder="http://www.example.com"/>
            <input type="submit" value="Envoyer ma contribution"/>
        </form>
        </div>
        <?php
        if(count($contributions)>0){
            echo "<div class='container'>";
            echo "<table id='contributions'>";
            echo "<tr><th>Lien</th><th>Validée ?</th></tr>";
            $i = 0;
            foreach ($contributions as $contrib) {
                $class = ($i%2 == 0) ? "pair":"impair";
                echo "<tr class=".$class.">";
                echo "<td>".$contrib['lien']."</td>";
                if($contrib['accepted']==1){
                    echo "<td><img class='accepted' src='./contents/img/verified.png' alt='acceptée'></td></tr>";
                }else{
                    echo "<td><img class='accepted' src='./contents/img/pending.png' alt='en attente...'></td></tr>";
                }
                $i=$i+1;
            }
            echo "</table>";
            echo "</div>";
        }else{
            echo "<h3>Pas encore de contributions</h3>";
        }
        
    }

?>

<?php require('views/view_end.php'); ?>