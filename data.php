<?php
require_once "config.php";

$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(!$connection){
    throw new Exception("Databse not connected");
}
else{
    echo "Database Connected";
}