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
                  <h4 class="card-title">Data Pengunjung</h4>
                  <p class="card-category">Selamat datan Perpustakaan Permusti</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-dark">
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </thead>
                <?php     
    foreach ($result as $res) {
        echo "<tr>";
        echo "<td>".$res['nama']."</td>";
        echo "<td>".$res['email']."</td>";    
        echo "<td>".$res['phone']."</td>";  
        echo "<td>".$res['alamat']."</td>"; 
        echo "<td>
        <a href=\"edit.php?id=$res[_id]\">Edit</a>
        <a href=\"delete.php?id=$res[_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>