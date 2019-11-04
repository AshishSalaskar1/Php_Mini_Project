<?php

	session_start();
	$uid = $_SESSION["UID"];
	$eOutput=$_POST["eOutput"];
	$pid = $_POST["pid"];

	$CC="g++ --std=c++11";
	$out="timeout 5s ./a.out";
	$code=$_POST["code"];
	$input=$_POST["input"];
	// echo $input;
	$filename_code="main.cpp";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;

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
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$output</pre>";
		$output = trim($output);
		$eOutput = trim($eOutput);
              echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
		
		
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
		echo "<center><img src='views/images/wrong.png'/></center><br><br>";
		echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
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
	if($seconds>3)
	{
		echo "<pre>Verdict : TLE</pre>";
	}
	else
	{
		echo "<pre>Verdict : AC</pre>";
	}
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
?>
