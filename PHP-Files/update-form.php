<?php
// include "update-script.php";
include "connection.php";
// require_once('update-form.php');

if(isset($_GET['edit']))
{   

    $id=$_GET['edit'];
    // echo $id;
    $editData=edit_Data($conn,$id);
}


if(isset($_POST['update']) && isset($_GET['edit'])) 
{
    
    $id=$_GET['edit'];
    // echo "Hello".$id;
    update_data($conn,$id);
}

// data transfer to update page
function edit_data($conn,$id)
{
    $query="select * from person where id=$id";
    $exec=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($exec);
    return $row;
}


//update data
function update_data($conn,$id)
{
    $name=legal_input($_POST['name']);
    $email=legal_input($_POST['email']);

    // $query="update person set name='$name',email='$email' where id='$id'";
    $query="UPDATE person SET name='$name', email='$email' WHERE id='$id' ";

    $exec=mysqli_query($conn,$query);

    if($exec)
    {
        // echo $id. "Success";
        header('location:home.php');
    }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
        echo  $msg;
    }
}

// convert illegal input to legal input
  function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }

?>



<!DOCTYPE html>
<html>
<head>
<title>UPDATE FORM</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-3">
    <h1 class="text-center bg-dark text-light">UPDATE DATA</h1>
     
    <p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>
    <form method="post" action="">
    <label id="name">Enter Name</label>
    <input type="text" name="name" id="name" class="form-control" required value="<?php echo isset($editData) ? $editData['name'] : '' ?>">

    <label id="name" class=" mt-3">Enter Email</label>
    <input type="email" name="email" id="email" class="form-control" required value="<?php echo isset($editData) ? $editData['email'] : '' ?>">

    <button type="submit" id="update" name="update" class="btn btn-warning  mt-3">Update</button>
    </form>
</div>

</body>
</html>