
<?php


// include "insert.php";
include "delete.php";
$ClassObj=new OOPCRUD();


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
    .pagination a.active {   
            background-color: #000;   
            color:#fff;
    }   
    .pagination a:hover:not(.active) {   
        background-color: red;
        color:#fff;
    }    
</style>

</head>
<body>
<div class="container mt-3" id="container1">
    <h1 class="text-center bg-dark text-light">PHP MySql CRUD Operation In OOPS</h1>

    <span id="result1" class="text-success"></span>
    <span id="result2" class="text-danger"></span>
    <form method="post" action="">
    <label for="name">Enter Name</label>
    <input type="text" name="name" id="name" class="form-control" required>

    <label for="email" class=" mt-3">Enter Email</label>
    <input type="email" name="email" id="email" class="form-control" required>
    
    <button type="submit" id="submit" name="insert" class="btn btn-primary  mt-3">Insert</button>

   
    </form>
</div>  
    
<table class="table container" id="container2">
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
        $records_per_page=4;
        if(isset($_GET['page']))
		{
			$page=($_GET['page']);
		}else{
			$page=1;
		}
        // echo $page;
		$start_from=($page-1)*$records_per_page;
        // echo $start_from;
        $result=$ClassObj->fetchData($records_per_page,$start_from);
        // print_r($result);
        $cnt=1+$start_from;
        while($row=mysqli_fetch_array($result))
        {
      ?>
        <tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><?php echo htmlentities($row['name']);?></td>
        <td><?php echo htmlentities($row['email']);?></td>
        <td><a class="btn btn-secondary" href="update.php?id=<?php echo htmlentities($row['id']);?>">Edit</a></td>
        <td><a class="btn btn-danger" href="index.php?del=<?php echo htmlentities($row['id']);?>">DELETE</a></td>
    <?php
    // for serial number increment
    $cnt++;
    } 

    ?>
</tbody>
</table>

<div class="container text-center pagination" id="container3">
    <?php
    $res=$ClassObj->getPage();
    $total_pages=ceil($res/$records_per_page);
    // echo $total_pages;
    for ($i=1; $i <= $total_pages; $i++) { 
        if($i==$page)
        {
            echo '<a class="active" id="read-data" href = "index.php?page=' . $i . '">' . $i . ' </a>'; 
        }else{
            echo '<a id="read-data" href="index.php?page=' . $i . '">' . $i . ' </a>'; 
        }
    }
    

    ?>
</div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>


