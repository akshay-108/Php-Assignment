<?php
include "oops.php";
//Deletion
if(isset($_GET['del']))
{
	// Geeting deletion row id
	$id=$_GET['del'];
	$deletedata=new OOPCRUD();
	$sql=$deletedata->delete($id);
	if($sql)
	{
		// Message for successfull insertion
		echo "<script>alert('Record deleted successfully');</script>";
		echo "<script>window.location.href='index.php'</script>";
	}
}else{
	echo "Error";
}
?>
