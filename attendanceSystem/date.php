<?php
require_once "db.php";
session_start();
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  
     $_SESSION['date']=$date;
  header("Location: date_display.php?date=$date");
}else {
$error_message = "Incorrect Email or Password!!!";
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
    <p class="sign" align="center">View by date</p>
    <form class="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input class="un " type="date" align="center" placeholder="Enter Date" name="date">
     
      <input type="submit" class="submit" align="center" id="submit" name="submit" value="Submit"></a>
      
            
                
    </div>
     
</body>

</html>