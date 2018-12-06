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
    E
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
              <div class="card">
        <table border="0">
            <tr> 
                <td>Nis</td>
                <td><input type="text" name="nis" value="<?php echo $nis;?>"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name" value="<?php echo $nama;?>"></td>
            </tr>
            <tr> 
                <td>Kelas</td>
                <td><input type="text" name="class" value="<?php echo $kelas;?>"></td>
            </tr>
            <tr> 
                <td>PK3</td>
                <td><input type="text" name="pk3" value="<?php echo $pk3;?>"></td>
            </tr>
            <tr> 
                <td>PK5</td>
                <td><input type="text" name="pk5" value="<?php echo $pk5;?>"></td>
            </tr>
            <tr> 
                <td>PK8</td>
                <td><input type="text" name="pk8" value="<?php echo $pk8;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>