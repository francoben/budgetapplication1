<?php
    //require connection

    require("includes/connection.php");

    //require session
    require("includes/session.php");

    confirm_logged_in ();

    $session_email=$_SESSION['email'];
    
    //fetch
    $query="SELECT * FROM budgetuser_tbl WHERE email='$session_email'";
    $result= mysqli_query ($conn,$query) OR die (mysqli_error ($conn));

    while ($row= mysqli_fetch_array($result)) {
        $session_userid=$row['id'];
        $session_firstname=$row['firstname'];
        $session_lastname=$row['lastname'];

    
    };

    echo '<h2>WELCOME '. $session_firstname.' '.$session_lastname.'</h2>';
     echo '<a href="logout.php">Logout</a>';

    ?>


<?php
$servername = "localhost";
$databasename="budgetapp_db";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
<?php

if ( isset( $_POST[ 'budgetuser_tbl'])){
   $item= $_POST['fname'];
   $number_of_item= $_POST['lname'];
   echo "<h1>";   
     $query="INSERT INTO budgetuser_tbl(firstname,lastname)
      VALUES('{$fname}','{$lname}')";
      $result=mysqli_query($conn,$query)or die(mysqli_error($conn));
      header("Location:index.php"); 
         # code...
      }

      if(isset($_GET['deleteid'])) {
         $deleteid=$_GET['deleteid'];
         $query="DELETE FROM budgetuser_tbl WHERE id = $deleteid";
         $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
      header("Location:index.php"); 
      
      }


?>
 <!DOCTYPE html>
<html>
<head>
   <title>form</title>
</head>
<body>

<div class="col-md-2"></div>

<div class="col-md-8">
<h2>LIST FORM</h2>
      <form action="index.php" name="register_form" onsubmit=" return validateform()"  method="POST">
      <label>list</label>
      <input type="text" class="form-control" name="fname"></input>
      <label>no of item</label>
      <input type="text" class="form-control" name="lname"></input>
      

      <input type="submit" name ="btn_register" value"submit" class="btn btn-primary" style="width: 100%;margin-top: 10px"></input>
      </form>
      </div>
<div class="col-md-2"></div>
<table>
<thead>
   <tr>
       <td>Item</td>
       <td>Number of item</td>
        <td>Action</td>
   </tr>
</thead>

<tbody>
     <?php
         $query= "SELECT * FROM budgetuser_tbl";
         $result=mysqli_query($conn,$query) or die(mysql_error($conn));
         while($row=mysqli_fetch_array($result)){
            echo '<tr>';
            echo '<td>'.$row['firstname']."</td>";
            echo '<td>'.$row['lastname']."</td>";
            echo  '<td>
               
               <a href="edit.php?id='.$row['id'].'">Edit</a>
               <a href="index.php?deleteid='.$row['id'].'" Onclick="return confirm(\'DELETE\');">Delete</a>

            </td>';
            echo  '</tr>';
            }

            
         
     ?>
</tbody> 

</table>
   </body>
            
</html>
