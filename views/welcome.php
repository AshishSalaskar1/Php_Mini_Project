<?php
// Initialize the session
session_start();
 
// // Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.css">
    <style type="text/css">

        body{ font: 14px sans-serif; text-align: center; }
        .panel{
            border: 2px solid #0A3D62;
            /* border-radius:px; */
            /* box-shadow: 5px 5px .5px #0A3D62; */
        }
        .panel:hover{
            border: 2px solid #0A3D62;
            /* border-radius:px; */
            box-shadow: 5px 5px .5px #0A3D62;
        }
        .links{
            text-decoration: none;
            color: black;
            font-size:20px;
        }
        .links:hover{
            text-decoration: none;
            color: #0A3D62;
            font-size:21px;
            font-weight: bold;
        }

    </style>
</head>
<body>

    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["uname"]); ?></b>. Welcome to our CodeBlocks.</h1>
        <h1>Your user id is <b><?php echo htmlspecialchars($_SESSION["UID"]); ?></b>. .</h1>
    </div>

    <center>

    <div class="container row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <img src="images/basics.png"/>
                </div>
                <div class="panel-body"><a class="links" href="hello.php">Basic Problems</a></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="images/array.png"/>
                </div>
                <div class="panel-body"><a class="links" href="arrays.php">Arrays</a></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                            <img src="images/sorting.png"/>
                </div>
                <div class="panel-body"> <a class="links" href="sorting.php">Sorting</a></div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container row">
    <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <img src="images/search.png"/>
                </div>
                <div class="panel-body">Searching</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="images/graphs.png"/>
                </div>
                <div class="panel-body">Graphs</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                            <img src="images/recursion.png"/>
                </div>
                <div class="panel-body"> Recursion</div>
            </div>
        </div>
    </div>
    </center>

</body>
</html>