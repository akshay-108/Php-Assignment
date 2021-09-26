<?php
include "connection.php";

if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	delete_data($conn,$id);
}

function delete_data($conn,$id)
{
	$query= "DELETE FROM person WHERE id=$id";
	$exec=mysqli_query($conn,$query);

	if($exec)
	{
		header('location:home.php');
	}else{
		$msg="Error: ".$query."\n".mysqli_error($conn);
		echo $msg;
	}
}


?>