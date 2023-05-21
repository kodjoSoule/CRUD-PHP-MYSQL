<?php
require_once('./connexion.php');
$isUpdate = false;
$stmt = $con->query("SELECT count(*) as count FROM t_crud") or die($con->error);
$reqListe = $con->query("select * from t_crud") or die($con->error);
if ($stmt) {
    $result = $stmt->fetch_assoc();
    $nbRow = $result['count'];
}
if (isset($_GET['disconnect'])) {
    include_once("./disconnect.php");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $req = $con->query("DELETE FROM t_crud WHERE id = $id") or die($con->error);

    $_SESSION['message'] = "Location supprimer avec success";
    $_SESSION['message_type'] = "alert-danger";

    //Redirection
    header('location:index.php');
    exit();
}
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $req = $con->prepare("SELECT * FROM t_crud WHERE id = ?") or die($con->error);
    $req->bind_param("s", $id);
    $req->execute();
    $resultReq = $req->get_result();
    $row = $resultReq->fetch_assoc();
    global $isUpdate1;
    $isUpdate1 = true;
    $nom = $row['name'];
    $location = $row['location'];
}
if (isset($_POST['btn_update'])) {
    $nouvelName = $_POST['nom'];
    $nouvelLocation = $_POST['location'];
    $id = $_POST['id'];
    echo "<p>$id</p>";
    echo "<p>$nouvelName</p>";
    echo "<p>$nouvelLocation</p>";
    // $con->query("UPDATE t_crud SET name=$nouvelName, location=$nouvelLocation WHERE id=$id ") or die($con->error);
    $con->query("UPDATE t_crud SET name = '$nouvelName', location ='$nouvelLocation' WHERE id='$id' ") or die($con->error);
    $isUpdate1 = true;
    $_SESSION['message'] = "Location mise a jour  avec success";
    $_SESSION['message_type'] = "alert-warning";
    header("location:index.php");
    exit();
}

if (isset($_POST['btn_add'])) {
    print_r($_POST);
    $nom = $_POST['nom'];
    $location = $_POST['location'];
    // Traitement de l'image
    if (isset($_FILES['myImage'])) {
        $image = $_FILES['myImage']['tmp_name'];
        $type_image = $_FILES['myImage']['type'];
        $target = "image/" . $_FILES['myImage']['name'];
        move_uploaded_file($image, $target);
        echo "<p>$target</p>";
    }
    //
    //inserer dans la base en tant fichier binaire de type BLOB



    $req = $con->prepare("insert into t_crud (name, location) values (?, ?)");
    $req->bind_param("ss", $nom, $location);
    $req->execute();

    $_SESSION['message'] = "Location ajouter avec success";
    $_SESSION['message_type'] = "alert-success";

    //
    // Insérer l'image dans la table t_image en tant que fichier binaire de type BLOB
    $imageBinaire = addslashes(file_get_contents($target));
    $reqImage = $con->prepare("INSERT INTO t_image (image, type) VALUES (?,?)");
    $reqImage->bind_param("bs", $imageBinaire, $type_image);
    $reqImage->execute();
    //
    $idImage = 5; // ID de l'image que vous souhaitez afficher
    
    // Exécuter la requête SELECT pour récupérer les images
    
    $result = $con->query("SELECT * FROM t_image");

    // Vérifier si des résultats ont été trouvés
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageData = $row['image'];
            $imageType = $row['type'];
            echo '<img width="300" src="data:'.$imageType.';base64,' . base64_encode($imageData) . '"/>';
        }
    } else {
        echo 'Image non trouvée...';
    }

    // header("location:index.php");
    exit();
}
