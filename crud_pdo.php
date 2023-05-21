<?php
// Informations de connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=nom_de_la_base_de_donnees;charset=utf8';
$user = 'utilisateur';
$password = 'mot_de_passe';

// Connexion à la base de données
try {
    $pdo = new PDO($dsn, $user, $password);
    // Configuration des attributs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
//
try {
    $sql = "INSERT INTO table (colonne1, colonne2, colonne3) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$valeur1, $valeur2, $valeur3]);
    echo "Enregistrement créé avec succès.";
} catch (PDOException $e) {
    echo "Erreur lors de la création de l'enregistrement : " . $e->getMessage();
}
//Insert

$sql = "INSERT INTO table (colonne1, colonne2, colonne3) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$valeur1, $valeur2, $valeur3]);

//Read

$sql = "SELECT * FROM table";
$stmt = $pdo->query($sql);
$resultat = $stmt->fetchAll();
foreach ($resultat as $row) {
    // Utilisation des données récupérées
    echo $row['colonne1'];
}

//

$sql = "UPDATE table SET colonne1 = ?, colonne2 = ? WHERE condition";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nouvelleValeur1, $nouvelleValeur2]);

//
$sql = "DELETE FROM table WHERE condition";
$stmt = $pdo->prepare($sql);
$stmt->execute();

//Deconnexion
$pdo = null; // Fermeture de la connexion
