<?php
if(isset($_GET['name'])){
    $filename = $_GET['name']; 
    header("Content-type: application/vdn.ms-excel");
    header("Content-Disposition: attachment; filename=$filename.com.xls");
}else{
    header("Content-type: application/vdn.ms-excel");
    header("Content-Disposition: attachment; filename=liste.com.xls");   
}


?>