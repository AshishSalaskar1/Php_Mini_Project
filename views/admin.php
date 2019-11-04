

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
body{
              font-family: "Times New Roman";
              font-size:20px;
}
#lForm{
    margin-left: 200px;
}
</style>

<?php
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["pName"];
    $cat = $_POST["pCat"];
    $desc = $_POST["pDesc"];
    $ipspec = $_POST["pIpSpec"];
    $input = $_POST["pIn"];
    $output = $_POST["pOut"];

    $db_server_name = "localhost:3306";
    $db_user_name = "ashish";
    $db_password="ashish98";
    $database_name = "web_project";

    $db_handle = mysqli_connect($db_server_name, $db_user_name, $db_password);

    if($db_handle === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    mysqli_select_db($db_handle,$database_name);
    
    $sqlStatement = "INSERT into problem_definitions (name,description,cat,input_spec,input,output) VALUES
    ('".$name."','".$desc."','".$cat."','".$ipspec."','".$input."','".$output
    ."');";
    

	if (mysqli_query($db_handle, $sqlStatement)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sqlStatement . "<br>" . mysqli_error($db_handle);
	}

    mysqli_close($db_handle);

}
 
?>
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin Section</title>
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

<div class="container jumbotron">

    <h2 style=" margin-left: 200px;">Enter The Problem Details to Add</h2>
    <br><hr>
    <form action="admin.php" id="lForm" method="post">
            <div class="form-group">
                <label for="pName">Problem Name:</label>
                <input type="text" class="form-control" id="pName" name="pName">
            </div>
            <div class="form-group">
                <label for="pCat">Program Category:</label>
                <input type="text" class="form-control" id="pCat" name="pCat">
            </div>
            <div class="form-group">
                <label for="pDesc">Program Description:</label>
                <br>(<i>Include the problem and input output specifications</i>)
                <textarea class="form-control" id="pDesc" name="pDesc" rows="10" cols="50"></textarea><br><br>
            </div>
            <div class="form-group">
                <label for="pIpSpec">Program Description:</label>
                <br>(<i>Include the sample input and output test case</i>)
                <textarea class="form-control" id="pIpSpec" name="pIpSpec" rows="10" cols="50"></textarea><br><br>
            </div>
            <div class="form-group">
                <label for="pIn">Enter input test case:</label>
                <textarea class="form-control" id="pIn" name="pIn" rows="10" cols="50"></textarea><br><br>
            </div>
            <div class="form-group">
                <label for="pOut">Enter Output test case:</label>
                <textarea class="form-control" id="pOut" name="pOut" rows="10" cols="50"></textarea><br><br>
            </div>
            
            <button class="btn btn-primary" onclick="checkSubmit()">Add Problem</button>
    </form>
   
</div>

<script>
function checkSubmit(){
    console.log("Clicked");
    // let pw = document.getElementById("pwd").value;
    // let pw1 = document.getElementById("pwd2").value;
    // let sub = document.getElementById("lForm");

    sub.submit();
}
</script>


</body>
</html>


