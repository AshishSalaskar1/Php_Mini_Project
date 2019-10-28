<?php

$db_server_name = "localhost:3306";
$db_user_name = "ashish";
$db_password="ashish98";
$database_name = "web_project";

$db_handle = mysqli_connect($db_server_name, $db_user_name, $db_password);
mysqli_select_db($db_handle,$database_name);

// $sql_stmt = "SELECT * FROM problem_definitions"; 
// $result = mysqli_query($db_handle,$sql_stmt);

// while ($row = mysqli_fetch_array($result)) {         
//     echo 'name: ' . $row['name'] . '<br>';         
//     echo 'description: ' . $row['description'] . '<br>';        
//     echo 'input: ' . $row['input'] . '<br>';         
//     echo 'output: ' . $row['output'] . '<br>';         
//     echo 'category: ' . $row['cat'] . '<br>';         
//     echo 'sample: ' . $row['input_spec'] . '<br>';            
// } 

// mysqli_close($db_handle);

?>