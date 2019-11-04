

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

    $uname = mysqli_real_escape_string($db_handle,$_POST['email']);
    $password = mysqli_real_escape_string($db_handle,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where email='".$uname."' and password='".$password."'";
        $result = mysqli_query($db_handle,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){

            $sql_stmt = "SELECT * FROM users where email='".$uname."';"; 
            $result = mysqli_query($db_handle,$sql_stmt);

            $id = "";
            $name = " ";
        
            while ($row = mysqli_fetch_array($result)) {         
                $id = $row["id"]; 
                $name = $row["name"];          
            } 
            echo $id;

            $_SESSION['uname'] = $name;
            $_SESSION['email'] = $uname;
            $_SESSION['loggedIn']=true;
            $_SESSION['UID']=$id;
            header('Location: ../views/welcome.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
 mysqli_close($db_handle);
 
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

<div class="row">
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
</div><br><br><br><br>

<div class="container jumbotron">
    <center>
    <h2>Login To Your Account</h2>
    <br><hr>
    <form action="login.php" id="lForm" method="post">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </center>
</div>




</body>
</html>


