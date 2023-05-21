<?php
    require_once('./connexion.php');
    $isUpdate = false ;
    $stmt = $con->query("SELECT count(*) as count FROM t_crud") or die($con->error);
    $reqListe = $con->query("select * from t_crud") or die($con->error);
    if($stmt){
        $result = $stmt->fetch_assoc() ;
        $nbRow = $result['count'];
    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $req = $con->query("DELETE FROM t_crud WHERE id = $id") or die($con->error);

        $_SESSION['message'] = "Location supprimer avec success" ;
        $_SESSION['message_type'] = "alert-danger" ;

        //Redirection
        header('location:index.php');
        exit();
    }
    if(isset($_GET['update'])){
        $id = $_GET['update'];   
        $req = $con->prepare("SELECT * FROM t_crud WHERE id = ?") or die($con->error);
        $req->bind_param("s", $id);
        $req->execute();
        $resultReq = $req->get_result();
        $row = $resultReq->fetch_assoc();
        global $isUpdate1 ;
        $isUpdate1 = true ;
        $nom = $row['name'] ;
        $location = $row['location'] ;
        

        
    }
    if(isset($_POST['btn_update'])){
        $nouvelName = $_POST['nom'];
        $nouvelLocation = $_POST['location'];
        echo "<p>ID $idUp</p>" ;
        echo "<p>NN $nouvelName</p>" ;
        echo "<p>NL $nouvelLocation</p>" ;
        $con->query("UPDATE t_crud SET name = $nouvelName, location =$nouvelLocation WHERE id=$idUp ") or die($con->error);
        $isUpdate1 = true ;
        $_SESSION['message'] = "Location mise a jour  avec success" ;
        $_SESSION['message_type'] = "alert-success" ;
        header("location:index.php");
        exit();
    }

    if(isset($_POST['btn_add'])){
        print_r($_POST);
        $nom = $_POST['nom'];
        $location = $_POST['location'];
        $req = $con->prepare("insert into t_crud (name, location) values (?, ?)");
        $req->bind_param("ss",$nom, $location);
        $req->execute();
        $_SESSION['message'] = "Location ajouter avec success" ;
        $_SESSION['message_type'] = "alert-success" ;
        header("location:index.php");
        exit();
    }


    
    
?>

