<?php 
        //require connection
        require("includes/connection.php");

        //require session
        require("includes/session.php");

        //call confirm logged in 
        confirm_logged_in();


        $session_email = $_SESSION['email'];

        //fetch 
         $query = "SELECT * FROM budgetusers_tbl WHERE email = '$session_email'";
         $result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));

         while($row = mysqli_fetch_array($result)){
               $session_userid = $row['id'];
               $session_firstname = $row['firstname'];
               $session_lastname = $row['lastname'];

         }
      
      //add budget item
         if(isset($_POST['btn_add_item'])){//

             //form data
            $budget_item = mysqli_escape_string($conn, $_POST['item']);
            $cost = $_POST['cost'];

            $query = "INSERT INTO budgetitems_tbl (item_name, item_cost, user_id)
            VALUE ('{$budget_item}', '{$cost}','{$session_userid}')";
            $result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));
            header("Location: index.php?success=true");

         }//

         //Delete budget Item
         if(isset($_GET['deleteid'])){
                $deleteid = $_GET['deleteid'];

                $query = "DELETE FROM budgetitems_tbl WHERE id =  $deleteid";
                $result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));
                header("Location: index.php?success_delete=true");  
            
         }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
                  echo '<h2>WELCOME '.$session_firstname.' '.$session_lastname.'</h2>';

                  echo '  <a href="logout.php">Logout</a>';
            ?>

            <?php if(isset($_GET['success'])){// ?>
            <div class="alert alert-success">
                Budget Item Added Successfully
            </div>
            <?php }// ?>

            <?php if(isset($_GET['success_delete'])){// ?>
            <div class="alert alert-info">
                Budget Item Removed Successfully
            </div>
            <?php }// ?>
         <h3>Enter Budget Items</h3>
         <form action="index.php" method="post">
             <label>Enter Budget Item</label>
             <input type="text" class="form-control" name="item">
             <label>Enter Cost</label>
             <input type="number" class="form-control" name="cost"><br/>

             <input type="submit" class="btn btn-primary" style="width:100%;" name="btn_add_item">

         </form>

         <h3>Buget Items</h3>
         <table class="table">
             <thead>
                 <tr>
                     <th>Item Name</th>
                     <th>Cost</th>
                     <th>Action</th>


                 </tr>
             </thead>
             <tbody>
                 <?php
                     //fetch
                 $query = "SELECT * FROM budgetitems_tbl WHERE user_id = $session_userid";
                 $result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result)){
                    echo '<tr>';
                    echo '<td>'.$row['item_name'].'</td>';
                     echo '<td>'.$row['item_cost'].'</td>';
                    echo '<td><a class="btn btn-primary btn-xs"  href="edit.php?id='.$row['id'].'"> Edit </a>  <a class="btn btn-danger btn-lg" href="index.php?deleteid='.$row['id'].'" onclick="return confirm(\'DELETE?\');">Delete</a></td>';
                    echo '</tr>';
                 }
                 ?>
             </tbody>
         </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</body>
</html>