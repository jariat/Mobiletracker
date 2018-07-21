<?php

$host='localhost';
$username='root';
$pwd='';
$db="price_tracer";
$follower= htmlspecialchars($_GET["follower"]);
$followee= htmlspecialchars($_GET["followee"]);

$con=mysqli_connect($host,$username,$pwd,$db) or die('Unable to connect');

if(mysqli_connect_error($con))
{
	echo "Failed to Connect to Database ".mysqli_connect_error();
}else{
$tt=date('Y-m-d G:i:s');

$sql = "INSERT INTO follows (`id`, `follower`, `followee`, `created_at`, `updated_at`) VALUES ('', '$follower', '$followee', '$tt', '$tt')";
 if(mysqli_query($con,$sql)){
  echo 'success';
  }else{

echo("Error description: " . mysqli_error($con));
}
}
  

mysqli_close($con);

?>
