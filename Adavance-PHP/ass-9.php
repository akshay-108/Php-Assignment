<?php
// Get array length/count without using any PHP pre-defined functions


$arrlen=[1,2,3,4,5,6];

$count=0;

foreach($arrlen as $val)
{
    // print_r($val);
    $count++;
}

echo "Array length ".$count."\n";

$i=0;
while($i<$count)
{
    echo "Array[$i] ".$arrlen[$i]."\n";
    $i++;
}


// while(isset($arrlen[$count]))
// {
//     $count++;
// }
// echo $count;


?>