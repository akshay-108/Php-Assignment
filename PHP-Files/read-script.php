<?php

include "connection.php";

$fetchdata=fetch_data($conn);

//fetch data
function fetch_data($conn)
{
    $query="select * from person";

    $exec = mysqli_query($conn,$query);

    if(mysqli_num_rows($exec)>0)
    {
        $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
        return $row;
    }else{
        return $row=[];
    }
    
}


?>