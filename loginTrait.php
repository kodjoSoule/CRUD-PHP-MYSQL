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
    $requete = "select * from t_users" ;
    $resultatReq = $con->query($requete);
    echo "<pre>" ;
    print_r($resultatReq);
    echo "</pre>" ;
    while($resultatReq1 = $resultatReq->fetch_array()){
        
        echo "<h1> Affichage </h1>" ;
        
        foreach($resultatReq1 as $id => $val){
            echo "<h1>".$id. " : " . $val. "</h1>";
        }
    }
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