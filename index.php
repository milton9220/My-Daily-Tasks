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

    <div class="table-part mb-5">
      <h4 class="d-inline mt-4">All Tasks</h4>
      <form action="">
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
            <tr>
            <td><input class="lablen-inline" type="checkbox"></td>    
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td><a href="#" class="delete mr-3"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <a href="#" class="edit mr-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="#" class="complete"> <i class="fa fa-check" aria-hidden="true"></i></a>
            </td>
            </tr>
            <tr>
            <td><input class="lablen-inline" type="checkbox"></td>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>
               <a href="#" class="delete mr-3"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <a href="#" class="edit mr-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="#" class="complete"> <i class="fa fa-check" aria-hidden="true"></i></a>
            </td>
            </tr>
            
        </tbody>
        </table>
        <select name="" class="select-item" id="action">
         <option value="0">With Selected</option>
         <option value="0">Delete</option>
         <option value="0">Mark As Complete</option>
         
        </select>
        <input type="submit" class="btn btn-primary" value="Submit">
        </form>
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
</div>


<!--bootstrap js and jquery-->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>   
</body>
</html>