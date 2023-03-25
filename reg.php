<?php
$con=new mysqli("localhost" , "root", "@EWK0129#");
if(!$con){
    echo "Not connected to Server"
}

$sql="SELECT * FROM employee"
$resu