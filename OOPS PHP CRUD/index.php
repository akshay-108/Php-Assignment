<?php

include "oops.php";
// include "delete.php";

$ClassObj=new OOPCRUD();
if(isset($_POST['insert']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];

    $sqlInsert=$ClassObj->insertData($name,$email);
    if($sqlInsert)
    {
        echo "data inserted Successfully";
    }else{
        echo "Data Not inserted";
    }
}
?>

<!DOCKTYPE html>
<html>
<head>
<title>PHP CRUD</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<style type="text/css">
     .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active:hover {   
            background-color: #000;
            color: #fff;
        }   
</style>
</head>
<body>
<div class="container mt-3">
    <h1 class="text-center bg-dark text-light">PHP MySql CRUD Operation In OOPS</h1>


    <form method="post" action="">
    <label id="name">Enter Name</label>
    <input type="text" name="name" id="name" class="form-control" required>

    <label id="name" class=" mt-3">Enter Email</label>
    <input type="email" name="email" id="email" class="form-control" required>
    
    <button type="submit" id="submit" name="insert" class="btn btn-primary  mt-3">Insert</button>

   
    </form>

</div>  
    
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
    <tbody>
     <?php
     $records_per_page=3;
     $page="";
      $sql=$ClassObj->fetchData($records_per_page,$page);
      while($row=mysqli_fetch_array($sql))
      {
      ?>
        <tr>
            <td><?php echo htmlentities($row['id']);?></td>
            <td><?php echo htmlentities($row['name']);?></td>
            <td><?php echo htmlentities($row['email']);?></td>
            <td><a class="btn btn-secondary" href="update.php?id=<?php echo htmlentities($row['id']);?>">Edit</a></td>
            <td><a class="btn btn-danger" href="delete.php?del=<?php echo htmlentities($row['id']);?>">DELETE</a></td>
        </tr>
    <?php
    } 
    ?>
</tbody>
</table>
<div class="container text-center pagination">
    <?php
        $pageLink="";
        $res=$ClassObj->getPage();
        $total_pages=ceil($res/$records_per_page);
        for ($i=1; $i <= $total_pages; $i++) { 
           
                echo '<a class="active" href = "index.php?page=' . $i . '">' . $i . ' </a>';
            } 

    ?>
</div>
<br><br><br><br><br><br>
</body>
</html>
