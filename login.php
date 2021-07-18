<?php  
// include config.php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>RENTAK MOBIL 7ION</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
</head>
<body>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">RENTAL MOBIL <span class="font-weight-bold text-primary">7ION</span></h5></div>
            <div class="card-body">
              <form action="proses.php" method="post">
                <div class="form-group">
                  <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                  <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Login" class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>