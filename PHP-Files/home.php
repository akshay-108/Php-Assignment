<?php
    include "create-script.php";
    include "update-script.php";
?>

<!DOCKTYPE html>
<html>
<head>
<title>PHP CRUD</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-3">
    <h1 class="text-center bg-dark text-light">PHP MySql CRUD Operation In OOPS</h1>
     
    <p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>
    <form method="post" action="home.php">
    <label id="name">Enter Name</label>
    <input type="text" name="name" id="name" class="form-control" required value="<?php echo $editdata['name'] ?>">

    <label id="name" class=" mt-3">Enter Email</label>
    <input type="email" name="email" id="email" class="form-control" required value="<?php echo $editdata['email'] ?>">

    <button type="submit" id="submit" name="create" class="btn btn-primary  mt-3">Insert</button>

    <button type="submit" id="submit" name="update" class="btn btn-warning  mt-3">Update</button>
    </form>
</div>


<?php

    include "read-script.php";
    
?>

<table class="table container">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>

   <?php
   
    if(count($fetchdata)>0)
    {
        $sn=1;
        foreach ($fetchdata as  $data) {
    ?>     

    <tr>

        <td><?php echo $sn; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><a href="update-script.php?edit=<?php echo $data['id'];?>">Edit</a></td>
        <td><a href="home.php?delete=<?php echo $data['id'];?>">Delete</a></td>
    </tr>

    <?php 
        $sn++;
        }
    }else{
        ?>
        <tr>
            <td colspan="4">No Data Found</td>
        </tr>
    <?php
    }
    ?>

</table>
<?php mysqli_close($conn); // Close connection ?>

</body>
</html>
<?php



?>