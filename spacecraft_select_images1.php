<?php

$host='localhost';
$username='root';
$pwd='';
$db="price_tracer";
$id= htmlspecialchars($_GET["name"]);

$con=mysqli_connect($host,$username,$pwd,$db) or die('Unable to connect');

if(mysqli_connect_error($con))
{
	echo "Failed to Connect to Database ".mysqli_connect_error();
}
  
$decodedurl= urldecode($id);

$sql="SELECT * FROM users INNER JOIN categories ON users.category_id = categories.id where is_wholesaler='1' AND  name='$id'";

$result=mysqli_query($con,$sql);
if($result)
{
	while($row=mysqli_fetch_array($result))
	{
		$data[]=$row;
		print(json_encode($data));
	}
	
	
}

mysqli_close($con);

?>
