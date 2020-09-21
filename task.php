<?php
require_once "config.php";
$action=$_POST['action'] ?? "";

if(!$action){
    header('Location:index.php');
    die();
}
else{
    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    if(!$connection){
    throw new Exception("Databse not connected");
    }
    else{
        $task=$_POST['task'];
        
        $date=$_POST['date'];
        if($task && $date){
            
            $query="INSERT INTO `tasks` (`id`, `task`, `date`, `complete`) VALUES (NULL, '{$task}', '{$date}', '0')";
            
            mysqli_query($connection,$query);
            header('Location:index.php?added=true');
        }
        else{
            echo "Your input field is empty";
        }
    
    }
}

