<?php

class OOPCRUD
{
	private $conn;
	public function __construct()
	{

		// for ubuntu
		// $servername="localhost";
		// $username="akshay";
		// $password="Akshay@147852369";
		// $dbname="oopscrud";

		// for windows
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="oopscrud";
		$this->conn=new mysqli($servername,$username,$password,$dbname);

		//check connection
		if($this->conn->connect_error)
		{
			echo "Failed To connect database" . mysqli_connect_error();
		}
		//else{
		// 	echo "Connection Successfull";
		// }
	}

	public function insertData($name,$email)
	{
		$query="INSERT INTO person(name,email) VALUES ('$name','$email')";
		$res=mysqli_query($this->conn,$query);
		return $res;
	}

	public function fetchData()
	{
		$query="SELECT * FROM person";
		$result=mysqli_query($this->conn,$query);
		return $result;
	}
	public function fetchonerecord($id)
	{
		$query="select * from person where id=$id";
    	$exec=mysqli_query($this->conn,$query);
    	$res=mysqli_fetch_assoc($exec);
    	return $res;
	}

	public function updateData($name,$email,$id)
	{
			
	    // $query="update person set name='$name',email='$email' where id='$id'";
	    $query="UPDATE person SET name='$name', email='$email' WHERE id='$id' ";
	    $res=mysqli_query($this->conn,$query);
	    if($res)
	    {
	        // echo $id. "Success";
	        header('location:index.php');
	    }else{
	        $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
	        echo  $msg;
	    }
		}

	public function delete($id)
	{
		$query="DELETE FROM person WHERE id=$id";
		$res=mysqli_query($this->conn,$query);
		return $res;
	}
}

?>