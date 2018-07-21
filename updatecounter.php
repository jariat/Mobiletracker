 <?php

$host='localhost';
$username='root';
$pwd='';
$db="price_tracer";

 //$username1=$_GET['name'];
$username1=$_GET['id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "username=".$username1;

$sql = "SELECT * FROM products where id='$username1'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {



        $view = $row["views"] + 1;
        echo "Views now".$view;
 
    }
} else {
    echo "0 results";
}

$sql = "UPDATE products SET views='$view' WHERE id='$username1'";

if ($conn->query($sql) == TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?> 