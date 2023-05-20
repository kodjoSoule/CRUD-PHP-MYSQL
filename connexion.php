<?php
$hostname = "localhost" ;
$username = "root" ;
$password = "root" ;
$database = "mydb" ;
//Connexion a une base de donnees 
$con = new mysqli($hostname, $username, $password, $database) ;
if ($con->connect_errno) {
    echo "Échec lors de la connexion à MySQL : (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
echo "Connexion reussie" ;