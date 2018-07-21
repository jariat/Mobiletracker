 <?php

$host='localhost';
$username='root';
$pwd='';
$db="price_tracer";



     $username1 = $_POST['email'];
    $password1 = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from users where email= 'ssss@gmail.com'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo json_encode('User Found');
       
    }
} else {
    echo json_encode("Cant find");
}



$conn->close();
?> 