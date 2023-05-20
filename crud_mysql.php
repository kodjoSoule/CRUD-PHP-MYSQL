<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_données");

// Vérification de la connexion
if ($mysqli->connect_errno) {
    echo "Échec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//Read
// Exécution d'une requête SELECT
$resultat = $mysqli->query("SELECT * FROM ma_table");

// Traitement des résultats
while ($ligne = $resultat->fetch_assoc()) {
    echo $ligne["colonne1"] . " " . $ligne["colonne2"];
}
//
$sql = "SELECT * FROM table";
$result = $mysqli->query($sql);
if ($result) {
    // Traiter les résultats
    while ($row = $result->fetch_assoc()) {
        // Manipuler chaque ligne de résultat
    }
    // Libérer les ressources du résultat
    $result->free();
} else {
    echo "Erreur lors de l'exécution de la requête : " . $mysqli->error;
}
//
//Create
// Exécution d'une requête INSERT
if ($mysqli->query("INSERT INTO ma_table (colonne1, colonne2) VALUES ('valeur1', 'valeur2')") === TRUE) {
    echo "Nouvel enregistrement créé avec succès.";
} else {
    echo "Erreur : " . $mysqli->error;
}
//Update
// Exécution d'une requête UPDATE
if ($mysqli->query("UPDATE ma_table SET colonne1='nouvelle_valeur' WHERE id=1") === TRUE) {
    echo "Enregistrement mis à jour avec succès.";
} else {
    echo "Erreur : " . $mysqli->error;
}
//Delete

// Exécution d'une requête DELETE
if ($mysqli->query("DELETE FROM ma_table WHERE id=1") === TRUE) {
    echo "Enregistrement supprimé avec succès.";
} else {
    echo "Erreur : " . $mysqli->error;
}
//Requete prepare
// Préparation d'une requête SELECT avec un paramètre
$stmt = $mysqli->prepare("SELECT * FROM ma_table WHERE id=?");

// Liaison du paramètre
$id = 1;
$stmt->bind_param("i", $id);

// Exécution de la requête
$stmt->execute();

// Traitement des résultats
$resultat = $stmt->get_result();


// Libération des résultats
$resultat->free();

// Fermeture de la connexion
$mysqli->close();
//
$stmt->close();
$mysqli->close();

