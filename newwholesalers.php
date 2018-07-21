<?php

$host='localhost';
$username='root';
$pwd='';
$db="price_tracer";

$con=mysqli_connect($host,$username,$pwd,$db) or die('Unable to connect');

if(mysqli_connect_error($con))
{
	echo "Failed to Connect to Database ".mysqli_connect_error();
}
  $date = date('Y-m-d G:i:s');

$newdate = strtotime ( '-7 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d G:i:s' , $newdate );


//$sql="SELECT * FROM users WHERE created_at BETWEEN '$newdate' and '$date'";

$sql="SELECT * FROM users INNER JOIN categories ON users.category_id = categories.id WHERE users.created_at BETWEEN '$newdate' and '$date'";

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