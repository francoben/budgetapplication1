<?php 
   //reqiure connection
   require("includes/connection.php");

   //requre session
   require("includes/session.php");

   //call confirm loged in
   confirm_logged_in();

   $session_email=$_SESSION['email'];

   //fetch
   $query = "SELECT * FROM budgetuser_tbl WHERE email = '$session_email'";
   $result = mysqli_query($conn, $query) OR die(mysqli_error($conn));

   while ($row = mysqli_fetch_array($result)){
    $session_userid = $row['id'];
    $session_firstname = $row['firstname'];
    $session_lastname = $row['lastname'];
   }

  

   //echo '<a href="logout.php">LOG OUT</a> <br>'
?>

<?php
  if (isset($_POST['btn_update'])) {
    $itemname=$_POST['itemname'];
    $itemcost=$_POST['itemcost'];

    $query="INSERT INTO budgetitem_tbl(itemname,itemcost) VALUES('{$itemname}', '{$itemcost}')";

    $result=mysqli_query($conn, $query) or die(mysqli_error($conn));
    header("Location: index.php");
  }
  ?>
  <?php
  if (isset($_POST['btn_update'])) {
    $itemname=$_POST['itemname'];
    $itemcost=$_POST['itemcost'];  
  }
  if (isset($_GET['deleteid'])) {
    $deleteid=$_GET['deleteid'];
    $query="DELETE FROM budgetitem_tbl WHERE id=$deleteid";
    $result=mysqli_query($conn, $query) or die(mysqli_error($conn));
    header("Location: index.php");
  }
  ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(image/v2.jpg);
           background-size: 100%; background-repeat: no-repeat;">
  <div class="container">
    <div class="col-md-2"> </div>
    <div class="col-md-8">
     <?php

          echo '<h2 style="color:#fff">WELCOME '.$session_firstname.' '. $session_lastname.'</h2>';

          echo '<a href="logout.php">LOG OUT</a> <br> <br>'
     ?>
     <!-- form start -->
       <form method="POST" action="index.php">
         <input type="text" name="itemname" placeholder="Item Name"  class="form-control">
         <br>
         <br>
         <input type="text" name="itemcost" placeholder="Item Cost"  class="form-control">
         <br>
         <input type="submit" name="btn_update" value="ADD" class="btn btn-primary" style="width: 100%;">
       </form>
       <!-- form collapse -->

       <!-- table start -->
       <style >
       table,td,th{
                   border: 1px solid #50d2f0;
       }
       table{
             border-collapse: collapse;
             width: 100%;
       }
       th{
          height: 50px;
       }
       </style>
         <table style="margin-top: 20px;color:#fff">
           <thead>
             <tr>
               <td style="padding-left:20px;background:color:#fff">Itemname</td>
               
               <td style="padding-left:20px">itemCost</td>
              
               <td style="padding-left: 20px">Action</td>
             </tr>
           </thead>
           <tbody>
           <?php
           $query= "SELECT * FROM budgetitem_tbl";
           $result=mysqli_query($conn, $query) or die(mysqli_error($conn));
           while ($row=mysqli_fetch_array($result)) {
             echo '<tr>';
               echo '<td>'.$row['itemname'].'</td>';
               echo '<td>'.$row['itemcost'].'</td>';
               echo '<td> 
               <a href="edit.php?id='.$row['id'].'" class="btn btn-primary" style="margin-top:1%">edit</a> 
               <a href="index.php?deleteid='.$row['id'].'" onclick="return confirm(\'delete\');" class="btn btn-danger" style="margin-top:1%">Delete</a> </td>';
             echo '</tr>';
           }
           ?>
           </tbody>
         </table>
         



         
         <!-- table collapse -->
    </div>
    <div class="col-md-2"> </div>
  </div>
</body>
</html>