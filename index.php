<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2662fdfa6a.js" crossorigin="anonymous"></script>
    <title>CRUD | PHP 2023</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-7">
                
                <div class="card">
                    <div class="card-header">
                    <h1 class="text-primary text-center">Liste des Location</h1>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <th scope="row">
                                        <button class="btn btn-danger">Delete</button>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <th scope="row">
                                        <button class="btn btn-danger">Delete</button>
                                    </th>
                                </tr>
                                <tr>
                                    
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                    <th scope="row">
                                        <button class="btn btn-danger">Delete</button>
                                    </th>
                                </tr>
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
            <div class="col-5 border border-dark">
                <h1 class="text-secondary text-center">Formulaire</h1>
                <form class="form">
                    <div class="form-group">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" name="location"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary mt-3 disabled" />
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</body>
</html>