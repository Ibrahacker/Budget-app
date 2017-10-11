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
        
        //check if $_GET['id'] isset
<?php 
        //require connection
        require("includes/connection.php");

        //require session
        require("includes/session.php");

        //call confirm logged in 
        confirm_logged_in();


        $session_email = $_SESSION['email'];

        //fetch 
         $query = "SELECT * FROM budgetuser_tbl WHERE email = '$session_email'";
         $result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));

         while($row = mysqli_fetch_array($result)){
               $session_userid = $row['id'];
               $session_firstname = $row['firstname'];
               $session_lastname = $row['lastname'];

         }
        
        //check if $_GET['id'] isset

         if(isset($_GET['id'])){

            $selectedid = $_GET['id'];

         }

         //update
         elseif(isset($_POST['btn_update'])){
            $selectedid = $_POST['id'];

             //form data
            $budget_item = mysqli_escape_string($conn, $_POST['item']);
            $cost = $_POST['cost'];

     $query = "UPDATE budgetitem_tbl SET itemname='$budgetitem', itemcost ='$cost' WHERE id = $selectedid";
            $result = mysqli_query($conn, $query)  OR die('here'.mysqli_error($conn));
            header("Location: edit.php?success=true&id=$selectedid");
         }
         else{
            header("Location: index.php");
         }
         
           //fetch

           $query="SELECT * FROM budgetitem_tbl WHERE id = $selectedid";
           $result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));
           while($row = mysqli_fetch_array($result)){
            $fetched_item_name = $row['itemname'];
            $fetched_item_cost = $row['itemcost'];

           }


    
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                Budget Item Updated Successfully
            </div>
            <?php }// ?>

             
         <h3>Edit Budget Items</h3>
         <form action="edit.php" method="post">
             <input type="hidden" name="id" value="<?php echo $selectedid; ?>" />
             <label>Enter Budget Item</label>
             <input type="text" class="form-control" name="itemname" value="<?php echo $fetched_item_name; ?>">
             <label>Enter Cost</label>
             <input type="number" class="form-control" name="itemcost" value="<?php echo $fetched_item_cost; ?>"><br/>

             <input type="submit" class="btn btn-success" style="width:100%;" name="btn_update" value="update">
<br/><br/>
             <a href="index.php" class="btn btn-warning" style="width:100%;">Cancel</a>

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
                 $query = "SELECT * FROM budgetitem_tbl WHERE userid = $session_userid";
                 $result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result)){
                    echo '<tr>';
                    echo '<td>'.$row['itemname'].'</td>';
                     echo '<td>'.$row['itemcost'].'</td>';
                    echo '<td><a class="btn btn-primary btn-sm"  href="edit.php?id='.$row['id'].'"> Edit </a>  <a class="btn btn-danger btn-sm" href="index.php?deleteid='.$row['id'].'" onclick="return confirm(\'DELETE?\');">Delete</a></td>';
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
         if(isset($_GET['id'])){

            $selectedid = $_GET['id'];

         }

         //update
         elseif(isset($_POST['btn_update'])){
            $selectedid = $_POST['id'];

             //form data
            $budget_item = mysqli_escape_string($conn, $_POST['item']);
            $cost = $_POST['cost'];

     $query = "UPDATE budgetitems_tbl SET item_name='$budget_item', item_cost ='$cost' WHERE id = $selectedid";
            $result = mysqli_query($conn, $query)  OR die('here'.mysqli_error($conn));
            header("Location: edit.php?success=true&id=$selectedid");
         }
         else{
            header("Location: index.php");
         }
         
           //fetch

           $query="SELECT * FROM budgetitems_tbl WHERE id = $selectedid";
           $result = mysqli_query($conn, $query)  OR die(mysqli_error($conn));
           while($row = mysqli_fetch_array($result)){
            $fetched_item_name = $row['item_name'];
            $fetched_item_cost = $row['item_cost'];

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
                Budget Item Updated Successfully
            </div>
            <?php }// ?>

             
         <h3>Edit Budget Items</h3>
         <form action="edit.php" method="post">
             <input type="hidden" name="id" value="<?php echo $selectedid; ?>" />
             <label>Enter Budget Item</label>
             <input type="text" class="form-control" name="item" value="<?php echo $fetched_item_name; ?>">
             <label>Enter Cost</label>
             <input type="number" class="form-control" name="cost" value="<?php echo $fetched_item_cost; ?>"><br/>

             <input type="submit" class="btn btn-success" style="width:100%;" name="btn_update" value="update">
<br/><br/>
             <a href="index.php" class="btn btn-warning" style="width:100%;">Cancel</a>

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
                    echo '<td><a class="btn btn-primary btn-xs"  href="edit.php?id='.$row['id'].'"> Edit </a>  <a class="btn btn-danger btn-xs" href="index.php?deleteid='.$row['id'].'" onclick="return confirm(\'DELETE?\');">Delete</a></td>';
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