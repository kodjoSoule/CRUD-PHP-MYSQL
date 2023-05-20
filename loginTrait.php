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
$nom = "Kodjo" ;
include_once "./connexion.php" ;
if(isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['password']) ){
    $login = $_POST['name'];
    $password = $_POST['password'];
    $requete = "select * from t_users where login=? and password =?" ;
    $con->prepare($requete);
    $con->bind_param(1, $login);
    $con->bind_param(2, $password);
    $resultatReq = $Req->execute();
    print_r($resultatReq);
    ?>
    <h1 id='sp'>
        <?php echo "Nom : ".$nom; ?>
        
    </h1>
    <h1 >
        <?php echo "Nom : ".$password;?>        
    </h1> 

    
    <?php
}
?>
</body>
</html>