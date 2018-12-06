<?php
use \MongoDB\BSON\ObjectID as MongoId;
// including the database connection file
include_once("index.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $user = array (
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'alamat' => $_POST['alamat'],
            );
    
    // checking empty fields
    $errorMessage = '';
    foreach ($user as $key => $value) {
        if (empty($value)) {
            $errorMessage .= $key . ' field is empty<br />';
        }
    }
            
    if ($errorMessage) {
        // print error message & link to the previous page
        echo '<span style="color:red">'.$errorMessage.'</span>';
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";    
    } else {
        //updating the 'users' table/collection
        $db->tanggota->updateOne(
                        array('_id' => new MongoId($id)),
                        array('$set' => $user)
                    );
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
} // end if $_POST
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = $db->tanggota->findOne(array('_id' => new MongoId($id)));
 
$nama = $result['nama'];
$email = $result['email'];
$phone = $result['phone'];
$alamat = $result['alamat'];
?>
<html>
<head>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Web Library
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
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
                    <tr>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <td><label class="bmd-label-floating">Nama</label></td>
                          <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <td><label class="bmd-label-floating">Email</label></td>
                          <td><input type="email" name="email" value="<?php echo $email;?>"></td>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone</label>
                          <input type="text" name="phone" value="<?php echo $phone;?>">
                        </div>
                      </div>
                      </div>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" name="alamat" value="<?php echo $alamat;?>">
                        </div>
                      </div>
                      </div>
                      </tr>
                      <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                    <input type="submit" class="btn btn-info pull-right" name="update" value="Update">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
</body>
</html>