<?php

use \MongoDB\BSON\ObjectID as MongoId;
//including the database connection file
include("index.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table/collection
$db->tanggota->deleteOne(array('_id' => new MongoId($id)));
 
//redirecting to the display page (index.php in our case)
("Location:index.php");
?>                                                                                                                                                                                                    