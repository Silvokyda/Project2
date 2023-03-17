<?php
  header('Location: index.php');
  exit;
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'booking_system');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



$sql = "SELECT customer_id, cust_name, email FROM customers_tbl";
$result = $db->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        print "<br> - id: ". $row["customer_id"]. "<br> - Name: ". $row["cust_name"]. "<br> - Email: " . $row["email"] . "<br>";
     
    }
} else {
    print "0 results";
}



$db->close();   
        ?> 



</body>
</html>