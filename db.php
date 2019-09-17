<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "YES", "mysql");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE datas(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data1T VARCHAR(50) NOT NULL,
	  data1H VARCHAR(50) NOT NULL,
	  data2T VARCHAR(50) NOT NULL,
	  data2H VARCHAR(50) NOT NULL,
	  data3T VARCHAR(50) NOT NULL,
	  data3H VARCHAR(50) NOT NULL
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
  $sql = "INSERT INTO `datas` (`id`, `data1T`, `data1H`, `data2T`, `data2H`, `data3T`, `data3H`) VALUES (\'34\', \'46\', \'23\', \'56\', \'4\', \'21\', \'56\')";

// Close connection
mysqli_close($link);
?>