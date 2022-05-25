<?php
require_once "db.php";
session_start();
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
  $student = mysqli_real_escape_string($conn, $_POST['student']);
  
     $_SESSION['student']=$student;
  header("Location: student_display.php");
}

?>
<html>

<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title></title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">View by student</p>
    <form class="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input class="un " type="text" align="center" placeholder="Enter Student Id" name="student">
     
      <input type="submit" class="submit" align="center" id="submit" name="submit" value="Submit"></a>
      
            
                
    </div>
     
</body>

</html>