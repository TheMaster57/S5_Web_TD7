<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Enregistrement</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>
        <div id="main">
            <div class="panel">

                <?php
                require('base.php');

                /* Script qui permet de vérifier que le nom d'utilisateur et le mot de passe figurent dans la base de données */
                include 'base.php';
                echo "BONJOUR";

                /* Récupération des variables du formulaire */
                $id = $_POST['id'];
                $password = $_POST['mdp'];

                /* Cryptage du mot de passe */
                $passcrypte = md5($password);

                /* Sélection dans la base */
                $resquery = mysql_query("SELECT COUNT(*) > 0 FROM users WHERE name='" . $id . "' AND password='" . $passcrypte . "'");
                $row = mysql_fetch_row($resquery);
                if (!$row[0]) {
                    echo "Erreur.";
                } else #
                    echo "Done.";
                    afficheUtilisateur($id);
                ?>

            </div>
        </div>
    </body>
</html>

<?php

function afficheUtilisateur($id) {
    $resquery = mysql_query("SELECT email, gets_emails FROM users WHERE name='" . $id . "'");
    $row = mysql_fetch_row($resquery);
    echo $row[0];
    echo $row[1];
}

?>
