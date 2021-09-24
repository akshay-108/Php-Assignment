<?php

require_once('connection.php');

if(isset($_GET['edit']))
{
    $name=$_GET['name'];
    $name=$_GET['email'];

    $editdata=edit_data($conn,$name,$email);
}

// if(isset($_POST['update']) && isset($_GET['edit']))
// {
//     $id=$_GET['edit'];

//     update_data($conn,$id);
// }

function edit_data($conn,$name,$email)
{
    echo $name;
    echo $email;
    return $row;
} 
// header('location:home.php');


// update data query

// update_data($conn,$id)
// {
//     $name = $_POST['name'];
//     $email = legal_input($_POST['email']);

//     $query="update person set name='$name', email='$email' where id=$id";

//     $exec=mysqli_query($conn,$query);

//     if($exec)
//     {
//         header('location:home.php');
//     }else{
//         $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
//         echo $msg;  
//     }
// }
// function legal_input($value) {
//     $value = trim($value);
//     $value = stripslashes($value);
//     $value = htmlspecialchars($value);
//     return $value;
//   }
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="name" value="<?php echo $editdata['name'] ?>" placeholder="Enter Name" Required>
  <input type="email" name="email" value="<?php echo $editdata['email'] ?>" placeholder="Enter email" Required>
  <input type="submit" name="update" value="Update">
</form>
</body>
</html>