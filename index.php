<?php
include_once "config.php";
$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(!$connection){
    throw new Exception("Databse not connected");
}
$query="SELECT * FROM tasks WHERE complete=0  ORDER BY date";
$results=mysqli_query($connection,$query);

$completeQuery="SELECT * FROM tasks WHERE complete=1  ORDER BY date";
$completeResults=mysqli_query($connection,$completeQuery);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Daily Notebook</title>
    <!--Custom css--->
    <link rel="stylesheet" href="css/style.css">

    <!--Bootstrap css--->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--fontawesome cdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="container">
    <div class="header mb-5">
       <h2 class="d-inline">My Daily Tasks</h2>
       <p class="mt-3">This is a daily notebook web application where we can add your daily tasks with a date </p>
    </div>
    <?php if(mysqli_num_rows($completeResults)>0){ ?>
        <div class="table-part mb-5">
      <h4 class="d-inline mt-4">Complete Tasks</h4>
      
      <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Tasks</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while($cdata=mysqli_fetch_assoc($completeResults)):
            $timestamp=strtotime($cdata['date']);
            $cdate=date("jS M,Y",$timestamp);
            ?>
            <tr>
            <td><input class="lablen-inline" type="checkbox" value="<?php echo $cdata['id'] ?>"></td>    
            <td><?php echo $cdata['id'] ?></td>
            <td><?php echo $cdata['task'] ?></td>
            <td><?php echo $cdate ?></td>
            <td><a href="#" class="delete mr-3" data-taskid="<?php echo $cdata['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a> |
                <a href="#" data-iid="<?php echo $cdata['id'] ?>" class="incomplete">Mark As Incomplete</a>
            </td>
            </tr>

        <?php endwhile; ?>   
        </tbody>
        </table>
    <?php } ?>  
   <p>.....</p>
    <?php if(mysqli_num_rows($results)==0){ ?>
        <p>All Tasks Not Found!!!</p>
    <?php }
     else {
    ?>    
    <div class="table-part mb-5">
      <h4 class="d-inline mt-4">Upcomming Tasks</h4>
      <form action="task.php" method="POST">
      <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Tasks</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($data=mysqli_fetch_assoc($results)):
                $timestamp=strtotime($data['date']);
                $date=date("jS M,Y",$timestamp);
                ?>
            <tr>
            <td><input name="taskids[]" class="label-inline" type="checkbox" value="<?php echo $data['id'] ?>"></td>    
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['task']; ?></td>
            <td><?php echo $date; ?></td>
            <td><a href="#" data-taskid="<?php echo $data['id']; ?>" class="delete mr-3"><i class="fa fa-trash" aria-hidden="true"></i></a>
                
                <a href="#" data-taskid="<?php echo $data['id']; ?>" class="complete"> <i class="fa fa-check" aria-hidden="true"></i></a>
            </td>
            </tr>
            <?php endwhile;
            mysqli_close($connection); ?>
            
            
        </tbody>
        </table>
        <select name="action" class="select-item" id="action">
         <option value="0">With Selected</option>
         <option value="bulk-delete">Delete</option>
         <option value="bulk-complete">Mark As Complete</option>
         
        </select>
        <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    <?php }
    ?>
        <p>....</p>

        
        <h4 class="my-5">Add Daily Work</h4>
        <p>
                <?php  
                      $added=$_GET['added'] ?? "";
                      if('true'==$added){
                          echo "Your daily task added successfully </br>";
                      }
                ?>

        </p>
        <form action="task.php" method="POST">
        <label for="tast">Task</label>
        
            <input type="text" class="form-control" name="task">
        

        <div class="input-group my-3">
            
            <input type="date" class="form-control" name="date">
           
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">
        <input type="hidden" name="action" value="add">

        </form>
    </div>
    <!--mark as complete form--->
    <form action="task.php" method="post" id="completeForm">
        <input type="hidden" name="action" id="caction" value="complete">
        <input type="hidden" name="taskid" id="taskid">
    </form>
    
    <!--mark as incomplete form--->
    <form action="task.php" method="post" id="incompleteForm">
        <input type="hidden" name="action" id="caction" value="incomplete">
        <input type="hidden" name="iid" id="iid">
    </form>

    <!--delete form--->
    <form action="task.php" method="post" id="deleteForm">
        <input type="hidden" name="action"  value="delete">
        <input type="hidden" name="did" id="did">
    </form>
</div>


<!--bootstrap js and jquery-->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
<script src="js/script.js"></script>  
</body>
</html>