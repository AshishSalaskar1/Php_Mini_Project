<?php

	session_start();
	$uid = $_SESSION["UID"];
	$eOutput=$_POST["eOutput"];
	$pid = $_POST["pid"];

	$CC="javac";
	$out="timeout 6s java Main";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="Main.java";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$runtime_file="runtime.txt";
	$executable="*.class";
	$command=$CC." ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
	$runtime_error_command=$out." 2>".$runtime_file;

	//if(trim($code)=="")
	//die("The code area is empty");
	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777 $executable"); 
	exec("chmod 777 $filename_error");	

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$output=shell_exec($out);
		}
		else
		{
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$runtime_error</pre>";
		//echo "<pre>$output</pre>";	
		  echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
		  $output = trim($output);
		  $eOutput = trim($eOutput);
		  if(strcmp($eOutput,$output) == 0){

			echo "Succesfully Accepted<br>";
			echo "<center><img src='views/images/correct.png'/></center><br><br>";

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
			VALUES ". "(" .$uid.",".$pid.",'cpp11');";

			// $sqlStatement = "insert into solved_problems(user_id,problem_id,language) VALUES (1,3,'C');";

			// echo "This one".$db_user_name;

			if (mysqli_query($db_handle, $sqlStatement)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sqlStatement . "<br>" . mysqli_error($db_handle);
			}

			mysqli_close($db_handle);

		}
		else{
			echo "<center><img src='views/images/wrong.png'/></center><br><br>";
		}
	
	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		echo "<center><img src='views/images/wrong.png'/></center><br><br>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$output</pre>";
		  echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
	}
	else
	{
		echo "<pre>$error</pre>";
		echo "<center><img src='views/images/wrong.png'/></center><br><br>";
	}
	$executionEndTime = microtime(true);
	$seconds = $executionEndTime - $executionStartTime;
	$seconds = sprintf('%0.2f', $seconds);
	echo "<pre>Compiled And Executed In: $seconds s</pre>";
	if($seconds>5)
	{
		echo "<pre>Verdict : TLE</pre>";
	}
	else
	{
		echo "<pre>Verdict : AC</pre>";
	}
	exec("rm $filename_code");
	exec("rm *.txt");
	exec("rm $executable");
?>
