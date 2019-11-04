

<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>


</head>
<body>
<div class="main">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="main.php"><strong>CodeBlocks</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="views/welcome.php">Solve Problems</a></li>
      <li><a href="views/practice.php">Practice</a></li>
      <li><a href="views/profile.php">Your Profile</a></li>
      <!-- <li><a href="ranking.php">Ranking</a></li> -->
      <li><button class="btn btn-danger" style="margin-left:30px;margin-top:8px;"> <a href="logout.php" style="color:white;">Log Out</a> </button></li>
    </ul>
  </div>
</nav>


<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;">Output</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row cspace">
<div class="col-sm-1">
</div>
<div class="col-sm-8">






<?php

	$languageID=$_POST["language"];
	// $pid = $_POST["pid"];

        error_reporting(0);
	if($_FILES["file"]["name"]!="")
	{
		include "../compilers/make.php";
	}
	else
	{
		switch($languageID)
			{
				case "c":
				{
					include("compilers/c.php");
					break;
				}
				case "cpp":
				{
					include("compilers/cpp.php");
					break;
				}

				case "cpp11":
				{
					include("compilers/cpp11.php");
					break;
				}
				case "java":
				{	
					include("compilers/java.php");
					break;
				}
				case "python2.7":
				{
					include("compilers/python27.php");
					break;
				}
				case "python3.2":
				{
					include("compilers/python32.php");
					break;
				}
			}
	}
?>

</div>

<div class="col-sm-3">

</div>
</div>
</div>
</div><br><br><br>

<div class="area">
<div class="well foot">
<div class="row area">
<div class="col-sm-3">
</div>

<div class="col-sm-5">


<!-- <div class="fm">

<b>Beta Version-2016</b><br>
<b>Developed By <a href="https://fb.com/ashadullah.shawon">Ashadullah Shawon</a></b>

</div> -->
</div>


<div class="col-sm-4">

</div>
</div>
</div>
</div>



</body>
</html>
