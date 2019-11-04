
<?php

	session_start();
	$uid = $_SESSION["UID"];
	$CC="python3";
	//$out="./a.out";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$eOutput=$_POST["eOutput"];
	$pid = $_POST["pid"];

	// echo "PID: ".$pid."<br>";

	$filename_code="main.py";
	$filename_in="input.txt";
	$filename_error="error.txt";
	//$executable="a.out";
	$command=$CC." ".$filename_code;
	$command_error=$command." 2>".$filename_error;

	//if(trim($code)=="")
	//die("The code area is empty");

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);

	

	//exec("chmod 777 $executable");
	exec("chmod 777 $filename_error");

	// echo("Input: ".$input."<br>");
	// echo("Output: ".$eOutput);

	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($command);
		}
		else
		{
			$command=$command." < ".$filename_in;
			$output=shell_exec($command);
		}
		echo "<pre>$output</pre>";

		echo $eOutput." ".$output."<br>";

		$output = trim($output);
		$eOutput = trim($eOutput);

		if(strcmp($eOutput,$output) == 0){

			if($eOutput != "test"){
				echo "Succesfully Accepted<br>";
				echo "<center><img src='views/images/correct.png'/></center><br><br>";
			}

			//save to database if solved
			// include("../sql.php");

			// include("../test.php");
			

			$db_server_name = "localhost:3306";
			$db_user_name = "ashish";
			$db_password="ashish98";
			$database_name = "web_project";

			$db_handle = mysqli_connect($db_server_name, $db_user_name, $db_password);

			if($db_handle === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}

			mysqli_select_db($db_handle,$database_name);

			$sqlStatement = "INSERT INTO solved_problems (user_id, problem_id, language)
			VALUES ". "(" .$uid.",".$pid.",'Python3');";

			// $sqlStatement = "insert into solved_problems(user_id,problem_id,language) VALUES (1,3,'Python3');";

			// echo "This one".$db_user_name;

			if (mysqli_query($db_handle, $sqlStatement)) {
				// echo "New record created successfully";
			} else {
				// echo "Error: " . $sqlStatement . "<br>" . mysqli_error($db_handle);
			}

			mysqli_close($db_handle);

		}
		else{
			if($eOutput != "test"){
				echo "Wrong Answer";
				echo "<center><img src='views/images/wrong.png'/></center><br><br>";
			}
		}
	}
	else
	{
		if($eOutput != "test"){
			echo "Wrong Answer";
			echo "<center><img src='views/images/wrong.png'/></center><br><br>";
		}
	}



	exec("rm $filename_code");
	exec("rm *.txt");
?>
