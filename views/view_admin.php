<?php require('views/view_begin.php'); ?>

<?php
    if(isset($bruh)){
        echo "<h1>ALERTE ALERTE, INTRU DETECTE, CALCUL DE SA POSITION GPS... DESTRUCTION DE SON PC...</h1>";
    }else{
        if(count($usersToValidate)>0){
?>    
        <div class="container">
        <table id="tableau_to_validate">
            <tr>
                <th>Pseudo</th>
                <th>email</th>
                <th>Privilège</th>
                <th>Validé ?</th>
            </tr>

            <?php
                $i=0;
                foreach ($usersToValidate as $user) {
                    $class = ($i%2 == 0) ? "pair":"impair";
            ?>

                    <tr class="<?= $class ?>">
                        <td><?=$user["pseudo"];?></td>
                        <td><?=$user["email"];?></td>
                        <td><?php echo ($user["privilege"]==2) ? 'Contributeur':'admin' ;?></td>
                        <td>
                            <form action="?controller=admin&action=validate" method="post">
                                <input name="id_user" type="hidden" value="<?= $user["id"] ?>"/>
                                <button class="validate_btn" name="validate" type="submit" value="ok"></button>
                                <button class="declined_btn" name="validate" type="submit" value="nope"></button>
                            </form>
                        </td>
                    </tr>
                
            <?php
                $i=$i+1;
                }
            ?>


        </table>
        </div>
        <?php }
            if(count($contributionsToValidate)>0){
        ?>

        <div class="container">
        <table id="tableau_contrib_to_validate">
            <tr>
                <th>Pseudo</th>
                <th>Lien</th>
                <th>Validé ?</th>
            </tr>

            <?php
                $i = 0;
                foreach ($contributionsToValidate as $contrib) {
                    $class = ($i%2 == 0) ? "pair":"impair";
            ?>

                    <tr class="<?= $class ?>">
                        <td><?=$contrib["pseudo"];?></td>
                        <td><a href="<?=$contrib["lien"];?>"><?=$contrib["lien"];?></a></td>
                        <td>
                            <form action="?controller=admin&action=validateContrib" method="post">
                                <input name="id_contrib" type="hidden" value="<?= $contrib["id_contrib"] ?>"/>
                                <button class="validate_btn" name="validate" type="submit" value="ok"></button>
                                <button class="declined_btn" name="validate" type="submit" value="nope"></button>
                            </form>
                        </td>
                    </tr>
                
            <?php
                $i=$i+1;
                }
            ?>


        </table>
        </div>
<?php } ?>
<?php } ?>
<?php require('views/view_end.php'); ?>