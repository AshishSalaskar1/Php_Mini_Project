

<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Pracrice</title>
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
        <script language="javascript" type="text/javascript" src="edit_area/edit_area_full.js"></script>

       

        <style>
            /* #cInput{
                display: none;
            } */
            body{
              font-family: "Times New Roman";
              font-size:20px;
            }
            .bg-success,.bg-primary{
              padding: 5px;
                padding-left:10px;
                
                border-radius: 10px;
            }
        </style>
      <script>
      editAreaLoader.init({
        id : "textarea_1"		// textarea id
        ,syntax: "cpp"			// syntax to be uses for highgliting
        ,start_highlight: true		// to display with highlight mode on start-up
      });
      </script>
        


</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../main.php"><strong>CodeBlocks</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="welcome.php">Solve Problems</a></li>
      <li><a href="practice.php">Practice</a></li>
      <li><a href="profile.php">Your Profile</a></li>
      <!-- <li><a href="ranking.php">Ranking</a></li> -->
      <li><button class="btn btn-danger" style="margin-left:30px;margin-top:8px;"> <a href="logout.php" style="color:white;">Log Out</a> </button></li>
    </ul>
  </div>
</nav>


<?php

  $name = "";
  $description="";
  $input="";
  $output="";
  $category="";
  $sample="";

?>



<div class="row cspace container">
<div class="col-sm-8">
<div class="form-group">
<form action="../compile.php" name="f2" method="POST">
        <label for="lang">Choose Language</label>

        <select id="langSel" class="form-control" name="language">
        <option value="c">C</option>
        <option value="cpp">C++</option>
        <option value="cpp11">C++11</option>
        <option value="java">Java</option>
        <option value="python2.7">Python2</option>
        <option value="python3.2">Python3</option>
          

        </select><br><br>

        <label for="ta">Write Your Code</label>

        <textarea id="textarea_1" class="form-control" name="code" rows="30" cols="300" onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}">
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


</div>
</div>
</div>
</div>

<script type="text/javascript">
            // function setCustominput(val){
            //     document.getElementById("cInput").value = val;
            // }

                document.getElementById("eOutput").value = "test";
            
            // function setPID(val){
                
            //     console.log(val);
            // }

</script>
 <script>

  const selectElement = document.getElementById('langSel');

  selectElement.addEventListener('change', (event) => {
      let lang = selectElement.value;
      let setL="";
      lang = lang.toLowerCase();
      if (lang == "c") setL = "c";
      if (lang == "java") setL = "java";
      if (lang == "python2.7" || lang=="python3.2") setL = "python";
      if (lang == "cpp" || lang=="cpp11") setL = "cpp";
      
      console.log(setL);

      editAreaLoader.init({
        id : "textarea_1"		// textarea id
        ,syntax: setL			// syntax to be uses for highgliting
        ,start_highlight: true		// to display with highlight mode on start-up
      });
  });

</script>
</body>
</html>


