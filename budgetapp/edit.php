
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$databasename="budgetapp_db";

$conn = new mysqli($servername, $username, $password, $databasename );

?>

<!DOCTYPE html>
<html>
<head>
   <title></title>

</head>
<body style="background-image: url(image/v2.jpg);
           background-size: 100%; background-repeat: no-repeat;">


 <?php
 if(isset($_GET['id'])) {
   $selectedid=$_GET['id'];
}
 elseif (isset($_POST['btn_update'])) {
   $id=$_POST['id'];
   $itemname=$_POST['itemname'];
   $itemcost=$_POST['itemcost'];
    
    $query="UPDATE budgetitem_tbl set itemname='{$itemname}', itemcost='{$itemcost}' WHERE id=$id";
    $result=mysqli_query($conn,$query ) or die(mysqli_error($conn));
    header("location: edit.php");
   }

   else{header("Location: index.php");}

   $query="SELECT * FROM budgetitem_tbl WHERE id= $selectedid";
   $result=mysqli_query($conn,$query ) or die(mysqli_error($conn));

   while ($row=mysqli_fetch_array($result)) {
        $itemname=$row['itemname'];
        $itemcost=$row['itemcost'];
       
   }

 ?>

  <center style="margin-top: 100px">
 <form action="edit.php" name="budget_form" method="POST">
 <input type="hidden" name="id" class="form-control" value="<?php echo $selectedid;?>">
 <label style="color:white">itemname</label>
 <input type="text" name="itemname" class="form-control">
 <label style="color:white">itemcost</label>
 <input type="text" name="itemcost" class="form-control">
 <input type="submit" name="btn_update" class="btn btn-primary"  value="update"  style="width: 10%; margin-top: 10px;">
 
 </form>

</center>
 


</body>
</html>

