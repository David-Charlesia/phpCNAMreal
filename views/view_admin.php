<?php require('views/view_begin.php'); ?>


        <?= print_r($usersToValidate) ?>
        <table id="tableau_to_validate">
            <tr>
                <th>Pseudo</th>
                <th>email</th>
                <th>Privilège</th>
                <th>Validé ?</th>
            </tr>

            <?php

                foreach ($usersToValidate as $user) {
                    
            ?>

                    <tr>
                        <th><?=$user["pseudo"];?></th>
                        <th><?=$user["email"];?></th>
                        <th><?php echo ($user["privilege"]==2) ? 'Contributeur':'admin' ;?></th>
                        <th>
                            <form action="?controller=admin&action=validate" method="post">
                                <input name="id_user" type="hidden" value="<?= $user["id"] ?>"/>
                                <button name="validate" type="submit" value="ok">Valider</button>
                                <button name="validate" type="submit" value="nope">Décliner</button>
                            </form>
                        </th>
                    </tr>
                
            <?php
                }
            ?>


        </table>
        


<?php require('views/view_end.php'); ?>