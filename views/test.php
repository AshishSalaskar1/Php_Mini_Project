<?php 
include("../sql.php");
        
echo "Started Now <br>";
// $sql = "INSERT INTO solved_problems (user_id, problem_id, language)
// VALUES ". "(" .$uid.",".$pid.",'Python3');";


echo "This one".$db_server_name;

// $sql = "insert into solved_problems(user_id,problem_id,language) VALUES (1,3,'Python3');";

// if (mysqli_query($db_handle, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($db_handle);
// }

mysqli_close($db_handle);


?>