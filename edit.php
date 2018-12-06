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
                  <h4 class="card-title">Update</h4>
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
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                        <input class="contact100-form-btn" type="submit" name="update" value="Update"></input>
                    <div class="clearfix"></div>
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