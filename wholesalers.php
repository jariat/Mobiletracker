<?php
$host='localhost';
$username='root';
$pwd='';
$db="price_tracer";
 $name=$_GET['name'];
$con=mysqli_connect($host,$username,$pwd,$db) or die('Unable to connect');

if(mysqli_connect_error($con))
{
	echo "Failed to Connect to Database ".mysqli_connect_error();
}


//$sql="SELECT * from products INNER JOIN users ON products.user_id = users.id where products.name='$name'";
$sql="SELECT products.name as productname,users.email,users.name,users.latitude,users.longitude,products.price,products.quantity from products INNER JOIN users ON products.user_id = users.id where users.name='$name'";

$result=mysqli_query($con,$sql);
if($result)
{
	while($row=mysqli_fetch_array($result))
	{
		$data[]=$row;
	}
	
	print(json_encode($data));
}

mysqli_close($con);

?>