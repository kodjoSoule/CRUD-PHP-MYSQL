<!DOCTYPE html>
<html lang="en">
<?php include_once"head.php" ?>
<body>
    <div class="container-fluid">       
        <div class="row mt-5">
            <div class="col-sm-6 ">
                <div class="p-5 ml-5 ">

                <h1 >Login UI | <span class='text-primary' id="element"></span></h1>
                    <form action="./loginTrait.php" method="POST">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text"  pattern="[a-zA-Z]{4,}" placeholder="Enter name" id="name" name="name" class="form-control"  required="required" />
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="text" placeholder="Enter password" id="password" name="password" class="form-control"  required="required" />
                        </div>
                        <button class="ml-3 btn btn-primary" type="submit" name="submit" >Connect</button>
                    </form>
                </div>
            </div>
            
            <div class="col-6 mt-5 d-none d-sm-block align-self-center">
                <div class="d-flex">
                    <div class="justify-content-center border-left border-primary align-middle">
                        <img class="img-fluid rounded "  alt="Screen 1" src="image/img1.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- inport -->



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    

<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<script src="js/index.js"></script>
<script>
  var typed = new Typed('#element', {
    strings: ['<span class="text-danger">Fontend dev</span>', 'Backend dev'],
    
    typeSpeed : 100,
    backSpeed : 100,
    backDelay : 1000,
    loop : true
  });
</script>
</body>
</html>