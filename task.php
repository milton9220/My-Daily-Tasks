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
        if('add' ==$action){
        $task=$_POST['task'];
        
        $date=$_POST['date'];
        if($task && $date){
            
            $query="INSERT INTO `tasks` (`id`, `task`, `date`, `complete`) VALUES (NULL, '{$task}', '{$date}', '0')";
            
            mysqli_query($connection,$query);
            header('Location:index.php?added=true');
         }
     }
     else if('complete'==$action){
         $taskid=$_POST['taskid'];
         if($taskid){
          $query="UPDATE tasks SET complete=1 WHERE id={$taskid}";
          mysqli_query($connection,$query);
         }
         header('Location:index.php');
      }
      else if('incomplete'==$action){
        $itaskid=$_POST['iid'];
        if($itaskid){
         $query="UPDATE tasks SET complete=0 WHERE id={$itaskid}";
         mysqli_query($connection,$query);
        }
        header('Location:index.php');
     }
     else if('delete'==$action){
        $dtaskid=$_POST['did'];
        if($dtaskid){
         $query="DELETE FROM tasks WHERE id={$dtaskid} LIMIT 1";
         mysqli_query($connection,$query);
        }
        header('Location:index.php');
     }
     else if('bulk-complete'==$action){
        $taskids=$_POST['taskids'];
        //print_r($taskids);
        $_taskids=join(",",$taskids);
        //echo $_taskids;
        if($taskids){
            $query="UPDATE tasks SET complete=1 WHERE id in ($_taskids)";
            mysqli_query($connection,$query);
        }
        header('Location:index.php');
       
     }

     else if('bulk-delete'==$action){
        $taskids=$_POST['taskids'];
        //print_r($taskids);
        $_taskids=join(",",$taskids);
        //echo $_taskids;
        if($taskids){
            $query="DELETE FROM tasks WHERE id in ($_taskids)";
            mysqli_query($connection,$query);
        }
        header('Location:index.php');
       
     }


  
  
  
  
    }
      
}

