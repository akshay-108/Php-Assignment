<?php

    include "connection.php";
    
    if(isset($_POST['create'])){
   
        $msg=insert_data($conn);
        
  }
  // insert query
  function insert_data($conn){
     
        $name= legal_input($_POST['name']);
        $email= legal_input($_POST['email']);
    
        $query="INSERT INTO person (name,email) VALUES ('$name','$email')";
        $exec= mysqli_query($conn,$query);
        if($exec){
          $msg="Data was created sucessfully";
          return $msg;
        
        }else{
          $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
          return $msg;
        }
  }
  // convert illegal input to legal input
  function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }

$conn->close();
?>