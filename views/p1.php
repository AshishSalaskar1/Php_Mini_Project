

<!DOCTYPE html>
<html>
<head>
  
    
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
        <script src="../bootstrap-3.3.7/js/bootstrap.min.js"> </script>
        <script src="../bootstrap-3.3.7/js/bootstrap.js"> </script>

        <style>
            /* #cInput{
                display: none;
            } */
        </style>

        


</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CodeBlocks</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Solve Problems</a></li>
      <li><a href="#">Practice</a></li>
      <li><a href="#">Community</a></li>
    </ul>
  </div>
</nav>


<?php 
  include("../sql.php");
  // echo "Helo".$_POST["problemId"]."<br>";
  $pid = $_POST["problemId"];
  // echo "PID: ".$pid."<br>";
?>

<?php
  $sql_stmt = "SELECT * FROM problem_definitions where p_id=".$pid.";"; 
  $result = mysqli_query($db_handle,$sql_stmt);

  $name = "";
  $description="";
  $input="";
  $output="";
  $category="";
  $sample="";

  
  while ($row = mysqli_fetch_array($result)) {         
      $name =  $row['name'];
      $description= $row['description'];
      $input= $row['input'];
      $output= $row['output'];
      // echo $output;
      $category= $row['cat'];
      $sample= $row['input_spec'];           
  } 
  
  mysqli_close($db_handle);
?>

<div id="container" class="container">
  <div id="problem_def">
    <h2> <?php echo $name ?> <h2> 
    
    <h4> Problem Description </h4>
    <p><?php echo $description ?></p>

    <h4> Sample Test Case </h4>
    <p><?php echo $sample ?></p>

  </div>
</div>


<div class="row cspace">
<div class="col-sm-8">
<div class="form-group">
<form action="../compile.php" name="f2" method="POST">
        <label for="lang">Choose Language</label>

        <select class="form-control" name="language">
        <option value="c">C</option>
        <option value="cpp">C++</option>
        <option value="cpp11">C++11</option>
        <option value="java">Java</option>
        <option value="python2.7">Python2</option>
        <option value="python3.2">Python3</option>
          

        </select><br><br>

        <label for="ta">Write Your Code</label>

        <textarea class="form-control" name="code" rows="10" cols="50" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}">
        </textarea>
        <br><br>
        <label for="in">Enter Your Input</label>
        <textarea class="form-control" id="cInput" name="input" rows="10" cols="50"></textarea><br><br>
        <input type="text" id="eOutput" name="eOutput" style="display:none;"/>
        <input type="text" id="problemId" name="pid" style="display:none;"/>
        <input type="submit" class="btn btn-success" value="Run Code"><br><br><br>
       
</form>

</div>
</div>
</div>
</div>


<br><br><br>
<div class="area">
<div class="well foot">
<div class="row area">
<div class="col-sm-3">


</div>

<div class="col-sm-5">


<div class="fm">

<b>Beta Version-2016</b><br>
<b>Developed By <a href="https://fb.com/ashadullah.shawon">Ashadullah Shawon</a></b>

</div>
</div>


<div class="col-sm-4">
<?php
date_default_timezone_set("Asia/Dhaka");
 $t=date("H:i:s");
echo"<b>Server Time:  $t</b>";

?>
</div>
</div>
</div>
</div>

<script type="text/javascript">
            function setCustominput(val){
                document.getElementById("cInput").value = val;
            }
            function setExpectedOp(val){
                document.getElementById("eOutput").value = val;
            }
            function setPID(val){
                
                console.log(val);
            }

            document.getElementById("problemId").value =" <?php echo $pid ?>";
            

            setCustominput(`<?php echo $input; ?>`);
            setExpectedOp("<?php echo $output; ?>");
           

</script>
</body>
</html>


