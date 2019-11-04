

<!DOCTYPE html>
<html>
<head>
<style>
  .panel {
    margin: 10px 30px;
}
#lForm{
    width:40%;
}
</style>

<?php
session_start();
include "../sql.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["userName"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $db_server_name = "localhost:3306";
    $db_user_name = "ashish";
    $db_password="ashish98";
    $database_name = "web_project";

    $db_handle = mysqli_connect($db_server_name, $db_user_name, $db_password);

    if($db_handle === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    mysqli_select_db($db_handle,$database_name);

    $sqlStatement = "INSERT INTO users (name, email, password)
			VALUES ". "('" .$name."','".$email."','".$password."');";

	if (mysqli_query($db_handle, $sqlStatement)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sqlStatement . "<br>" . mysqli_error($db_handle);
	}

    mysqli_close($db_handle);

    header('Location: ../views/welcome.php');



}

 
?>
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="../js/vendor/jquery-1.12.0.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script src="../bootstrap-3.3.7/js/bootstrap.js"></script>


</head>
<body>
<div class="main">

<!-- <div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-inverse navbar-fixed-top nbar">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="index.php">Code Blocks</a>
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
    </div>
   <div class="collapse navbar-collapse navbar-menubuilder">
    <ul class="nav navbar-nav">
      <li class="space"><a href="compiler.php"><i class="fa fa-code ispace"></i>Compiler</a></li>
      <li class="space"><a href="archive.php"><i class="fa fa-archive ispace"></i>Problem Archive</a></li>
      <li class="space"><a href="contest.php"><i class="fa fa-cogs ispace"></i>Contests</a></li>
      <li class="space"><a href="#"><i class="fa fa-check-square ispace"></i>Debug</a></li>
    </ul>
    </div>
  </nav>
  </div>
</div><br><br><br><br> -->

<div class="container jumbotron">
    <center>
    <h2>Register Your Account</h2>
    <br><hr>
    <form action="register.php" id="lForm" method="post">
            <div class="form-group">
                <label for="UserName">User Name:</label>
                <input type="text" class="form-control" id="userName" name="userName">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password">
            </div>
            <div class="form-group">
                <label for="pwd2">Confirm Password:</label>
                <input type="password" class="form-control" id="pwd2" name="passwordConfirm">
            </div>
            <button class="btn btn-primary" onclick="checkSubmit()">Register</button>
    </form>
    </center>
</div>

<script>
function checkSubmit(){
    console.log("Clicked");
    let pw = document.getElementById("pwd").value;
    let pw1 = document.getElementById("pwd2").value;
    let sub = document.getElementById("lForm");

    if (pw == pw1){
        sub.submit();
    }
}
</script>


</body>
</html>


