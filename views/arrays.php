

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
.panel{
    margin: 10px 200px;
}
</style>

<?php
// session_start();
// echo $_SESSION["uname"];
include("../sql.php"); 
$sql_query = "select * from problem_definitions where cat='arrays';";
$result = mysqli_query($db_handle,$sql_query);

$idArr = array();
$nameArr = array();

while ($row = mysqli_fetch_array($result)) {         
  $id = $row["p_id"]; 
  $name = $row["name"];    
  
  array_push($idArr,$id);
  array_push($nameArr,$name);
} 

// for($i=0;$i<count($idArr);$i++){
//   echo $idArr[$i]." ".$nameArr[$i]."<br>";
// }


?>

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

<form method="POST" action = "../views/p1.php" id="mainForm">
 <input type="text" name="problemId" id="probId" style="display:none;"/>
 <div class="container">
    <div id="mainPage">

      <!-- <div class="panel panel-primary">
         <div class="panel-heading">Panel Heading</div>
         <div class="panel-body">
            <input type="submit" value="Solve Problem"/>
         </div>
      </div> -->

    </div>
 </div>
</form>

</body>

<script type="text/javascript">

  let N = <?php  echo count($idArr) ?>
  
  let main = document.getElementById("mainPage");

  let nameArr = [
      <?php 
      for($i=0;$i<count($idArr)-1;$i++){
        echo "'".$nameArr[$i]."'".",";
      } 
      echo "'".$nameArr[count($idArr)-1]."'";
      ?>
  ];

  let idArr = [
      <?php 
      for($i=0;$i<count($idArr)-1;$i++){
        echo "'".$idArr[$i]."'".",";
      } 
      echo "'".$idArr[count($idArr)-1]."'";
      ?>
  ];

  function reply_click(clicked_id)
  {
      let pEle = document.getElementById("probId");
      pEle.value = clicked_id;
      console.log(clicked_id);
      let formEle = document.getElementById("mainForm");
      formEle.submit();

  }

  for(let i=0;i<N;i++){
    
      main.innerHTML += `
      <div class="panel panel-primary">
         <div class="panel-heading"><strong>${i+1} ) </strong>&nbsp;${nameArr[i]}
         
         </div>
         <div class="panel-body">
            <span>Problem id: ${idArr[i]}</span> &nbsp;&nbsp;&nbsp;
            <span><button id=${idArr[i]} onClick="reply_click(this.id)" class="btn btn-success">Solve Problem</button></span>
         </div>
      </div>`;
  }

</script>
</html>


