<?php
    session_start();
    $uid = $_SESSION["UID"];
    $uname = $_SESSION["uname"];

    include("../sql.php"); 
    $sql_query = "select * from solved_problems where user_id=".$uid.";";
    $result = mysqli_query($db_handle,$sql_query);

    $idArr = array();
    $nameArr = array();

    while ($row = mysqli_fetch_array($result)) {         
        $id = $row["problem_id"];    
    
        array_push($idArr,$id);
    } 

    for($i=0;$i<count($idArr);$i++){
    //   echo $idArr[$i]."<br>";
      $it = $idArr[$i];
      $sql_query = "select * from problem_definitions where p_id=".$it.";";
      $result = mysqli_query($db_handle,$sql_query);
      while ($row = mysqli_fetch_array($result)) {         
        $name = $row["name"];    
    
        array_push($nameArr,$name);
        } 
    }

    // for($i=0;$i<count($idArr);$i++){
    //     //   echo $idArr[$i]."<br>";
    //       $it = $idArr[$i];
    //       $nameNew = $nameArr[$i];
    //       echo $idArr[$i].":".$nameNew."<br>";
         
    // }

    mysqli_close($db_handle);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.css">
    <style type="text/css">

        body{ font: 14px sans-serif; }
          

    </style>
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
</nav>>

    <div class="page-header container">
        <h4>UserName: <b><?php echo htmlspecialchars($_SESSION["uname"]); ?></b></h4>
        <!-- <h4>UserId: <b><?php echo htmlspecialchars($_SESSION["UID"]); ?></b></h4> -->
        <h4 id="congrats" class="bg-success"></h4>
        <hr>
        <h2>Solved Problems</h2>
    </div>

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


<script type="text/javascript">

    let N = <?php  echo count($idArr) ?>

    let main = document.getElementById("mainPage");
    let congrats =document.getElementById("congrats");

    congrats.innerHTML = `
        Congratulations! You have solved <strong style="font-size:30px;"> ${N} </strong>problems on CodeBlocks   
    `;

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
            <span><button id=${idArr[i]} onClick="reply_click(this.id)" class="btn btn-success">Solve Problem Again?</button></span>
         </div>
      </div>`;
    }
</script>

</body>
</html>