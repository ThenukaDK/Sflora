<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","root") or die("not connected");
    $db=mysql_select_db("sflora",$con) or die("wtf");
    $query=mysql_query("select * from sf_whole_table where mainCatogory LIKE '%{$key}%' or subCatogory LIKE '%{$key}%' or color LIKE '%{$key}%'") or die("wtf2");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['color'];
      $array[] = $row['mainCatogory'];
      $array[] = $row['subCatogory'];



    }
    echo json_encode($array);
   
?>
