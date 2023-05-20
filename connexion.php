<?php
$hostname = "localhost" ;
$username = "root" ;
$password = "root" ;
$database = "mydb" ;
//Connexion a une base de donnees 
$con = new mysqli($hostname, $username, $password, $database) ;
if ($mysqli->connect_errno) {
    echo "Échec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}
echo "Connexion reussie" ;