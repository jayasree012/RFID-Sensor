<?php
require_once "db.php";
session_start();
$student1=$_SESSION['student'];
$query1 = "SELECT Member_ID FROM student_list WHERE Roll_No = '$student1'";
//unset($_SESSION['student']);
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) > 0) {
 $sn=1;
 $data1 = mysqli_fetch_assoc($result1); 
 $query = "SELECT * FROM attendance_details WHERE Member_ID = '".$data1['Member_ID']."'";
 $result = mysqli_query($conn, $query);
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Roll No</th>
    	<th>Member_id</th>
    	<th>date</th>
      </tr>
    </thead>  

<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tbody>
 <tr>
   
   <td><?php echo $data['ID']; ?> </td>
   <td><?php echo $student1; ?> </td>
   <td><?php echo $data['Member_ID']; ?> </td>
   <td><?php echo $data['date']; ?> </td>

   
 <tr>
 <tbody>
 </div>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } ?>
 </table>
 <body>
 </html>