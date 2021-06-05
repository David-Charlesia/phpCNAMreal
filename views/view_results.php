<?php require('views/view_begin.php'); ?>

        <header>
			<h1><a href="?"> PHP CNAM </a></h1>
            <h2>Site de recherche de spectacle</h2>
			<p>Voici vos résultats <?= $_COOKIE['pseudo']?></p>
            <p>Ville : <?= $city ?> </p>
		</header>
        
        <main>
        <div id=container>
        <?php 
        $fields = sparql_field_array( $results );
          
        print "<p>Nombre de résultats: ".sparql_num_rows( $results )." results.</p>";
        ?>
        <table>
        <tr>
        <th>Lien</th>
        <th>Titre</th>
        <th>Date</th>
        <th>Lieu</th>
        </tr>
        <?php
        $marker_js = "";
        $temp = "";
        $tab=[];
        $tab_temp=[];
        $i = 0;
        while( $row = sparql_fetch_array( $results ) ){
            //$row['Titre']='tesssssssssssst';
           // $marker_js= $marker_js."L.marker([".$row['Latitude'].", ".$row['Longitude']."]).addTo(mymap).bindPopup('<h2>Titre : ".addslashes($row['Titre'])."</h2><h3>Lieu : ".$row['Nom_Lieu']."</h3><h3>Date : ".$row['Date']."</h3><a href=".$row['Spectacle'].">Lien</a>');";
            $class = ($i%2 == 0) ? "pair":"impair";
           print"<tr class='".$class."'>";
           print "<td><a href=".$row['Spectacle'].">Lien</a></td>";
           print "<td>".$row['Titre']."</td>";
           $date = new DateTime($row['Date']);
           print "<td>".$date->format('d-m-Y')."</td>";
           print "<td>".$row['Nom_Lieu']."</td>";
           print"</tr>";

           
            if($bd->my_in_array(array($row['Latitude'], $row['Longitude']),$tab_temp)){
                $pos = array_search(array($row['Latitude'], $row['Longitude']),$tab_temp);
                $tab[$pos] = $tab[$pos]."<li><div><h2>Titre : ".addslashes($row['Titre'])."</h2><h3>Lieu : ".addslashes($row['Nom_Lieu'])."</h3><h3>Date : ".addslashes($row['Date'])."</h3><a href=\'".addslashes($row['Spectacle'])."\'>Lien</a></div></li>";
            }else{
                array_push($tab, "L.marker([".$row['Latitude'].", ".$row['Longitude']."]).addTo(mymap).bindPopup('<ul class=\"mypopup\"><li><div><h2>Titre : ".addslashes($row['Titre'])."</h2><h3>Lieu : ".addslashes($row['Nom_Lieu'])."</h3><h3>Date : ".addslashes($row['Date'])."</h3><a href=\'".addslashes($row['Spectacle'])."\'>Lien</a></div></li>");
                array_push($tab_temp, array($row['Latitude'], $row['Longitude']));
            }

        
            $i = $i + 1;
           //$marker_js= $marker_js."L.marker([".$row['Latitude'].", ".$row['Longitude']."]).addTo(mymap).bindPopup('<h2>Titre : ".addslashes($row['Titre'])."</h2><h3>Lieu : ".addslashes($row['Nom_Lieu'])."</h3><h3>Date : ".addslashes($row['Date'])."</h3><a href=".addslashes($row['Spectacle']).">Lien</a>');";
        }
        print "</table>";

        foreach ($tab as $value) {
         $marker_js = $marker_js.$value."</ul>');";
     }

        ?>
        </div>
        <div id="mapid">

</div>

  <?php 
      require('views/map.php');
  ?>
</main>
<?php require('views/view_end.php'); ?>