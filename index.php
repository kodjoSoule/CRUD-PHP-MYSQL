<?php session_start(); ?>
<?php
if (!isset($_SESSION['isLogin'])) {
    header('location:login.php');
}
$isUpdate1 = false;
$nom = "";
$location = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>CRUD | PHP 2023</title>
</head>

<body>

    <?php require("traitement.php") ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>
                    <a href="index.php" class="btn btn-primary text-uppercase">Administrateur</a> : <span class="h-2 text-uppercase"><?php echo $_SESSION['login']; ?></span>
                    <a href="./index.php?disconnect=0" class="btn btn-danger justify-content-right">Deconnecter</a>
                </h1>
            </div>
        </div>
        <?php if (isset($_SESSION['message'])) : ?>
            <div class="row mt-3">
                <div class="col">
                    <div class="alert <?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <div class="row mt-5">
            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-primary text-center" id="titre">Liste des Location
                            <span class="badge text-bg-secondary">
                                <?php
                                if (isset($nbRow)) {
                                    echo $nbRow;
                                }

                                ?>
                            </span>
                        </h1>
                    </div>
                    <div class="card-body">
                        <!--  -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $reqListe->fetch_assoc()) :
                                    // print_r($row);
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['location']; ?></td>
                                        <th scope="row">
                                            <a href="index.php?update=<?php echo $row['id']; ?>" name="edit" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="index/delete?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </th>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
            <div class="col-5 border border-dark">
                <h1 class="text-secondary text-center">Formulaire</h1>
                <form class="form" method="POST" action="./traitement.php"  enctype="multipart/form-data">
                <?php if ($isUpdate1) : ?>
                    <div class="form-group">
                        <label class="form-label">ID</label>
                        <input type="text" name="id" readonly class="form-control-plaintext" value="<?php echo $id ?>" required />
                    </div>
                <?php endif ; ?>
                    <div class="form-group">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" value="<?php echo $nom ?>" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" value="<?php echo $location ?>" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Image</label>
                        <?php $image = 0  ;?>
                        <input type="file" class="form-control" name="myImage" value="<?php echo $image ?>" required />
                    </div>
                    <?php if ($isUpdate1) : ?>
                        <div class="form-group">
                            <input type="submit" name="btn_update" value="Update" #id="btn_update" class="btn btn-warning mt-3" />
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <input type="submit" name="btn_add" value="btn_add" #id="msave" class="btn btn-primary mt-3" />
                        </div>
                    <?php endif; ?>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popmotion/dist/popmotion.global.min.js"></script>
    <script src="./js/index.js"></script>

</body>
</body>

</html>
<?php
// Supprimer la variable de session
unset($_SESSION['message']);
unset($_SESSION['message_type']);
?>