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


$sql="SELECT DISTINCT name from products INNER JOIN categories ON products.category_id = categories.id where categories.id='$name'";

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