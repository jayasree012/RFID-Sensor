<?php
require_once "db.php";
if(isset($_SESSION['user_id'])!="") {
header("Location: dashboard.php");
}
if (isset($_POST['date'])) {


header("Location: date.php");

}
if (isset($_POST['student'])) {


  header("Location: student.php");
  
  }

?>
<html>

<head>
  <link rel="stylesheet" href="style1.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Choose</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Choose</p>
    <form class="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input class="un " type="submit" align="center" value="view by date" name="date">
      <input class="pass" type="submit" align="center" value="view by student" name="student">
      
      
            
                
    </div>
     
</body>

</html>