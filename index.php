<!DOCTYPE html>
<html>
	<?php
require_once __DIR__ . "/vendor/autoload.php";

$connection = new MongoDB\Driver\Manager();
$db = (new MongoDB\Client)->dblib;

$collection = (new MongoDB\Client)->dblib->tanggota;

$result = $collection->find();

?>
<head>
<meta charset="utf-8" />
  <title>
    Web Library
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
</head>
<body class="">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Create User</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form act method="post">
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" class="form-control" name="nama">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone</label>
                          <input type="tel"pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}"
       required class="form-control" name="phone">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" class="form-control" name="alamat">
                        </div>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-info pull-right" name="Submit" value="add">
                    <div class="clearfix"></div>
                  </form>
                  <form action="lihat.php">
                          <input type="submit" value="Lihat" class="btn btn-info pull-right"/>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['Submit'])){
$insertOneResult = $collection->insertOne([
    'nama' => $_POST['nama'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'alamat' => $_POST['alamat'],
]);}
?>