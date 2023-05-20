<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>OK</h1>
    <?php
    $nom = "Kodjo";
    include_once "./connexion.php";
    if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['password'])) {
        $login = $_POST['name'];
        $password = $_POST['password'];
        $requete = "select * from t_users where login=? and passwork=? limit 1";
        $stm = $con->prepare($requete);
        if (!$stm) {
            echo "<h2 style='color:red'>erreur de requete<h2>";
        } else {
            $stm->bind_param('ss', $login, $password);

            $stm->execute();
            $resultatReq = $stm->get_result();
            // while ($data = $resultatReq->fetch_assoc()) {
            //     echo "<pre>";
            //     print_r( $data);
            //     echo "</pre>";
            // }
            //
            if ($data = $resultatReq->fetch_assoc()) {

                $_SESSION['login'] = $data['login'];
                $_SESSION['isLogin'] = true;

                echo "<pre>";
                print_r($data);
                echo "</pre>";
            }


            // Fermeture de la connexion
            $con->close();
        }
    ?>
    <?php
    }
    ?>
    <a href="./index.php">Home PG</a>
</body>

</html>