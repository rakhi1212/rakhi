<?php


$showAlert = false;
$showError = false;
$Test_name = "";
    $No_of_subjects ="";
    $Date_of_creation = "";
    $Pass_percentage = "";
    $No_of_attempts = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){      
    include 'configuration.php' ; 
    $conn = $conn; 

    // if($_POST['submit']){

    
    
    $Test_name = $_POST['Test_name'];
    // $No_of_subjects = $_POST['No_of_subjects'];
    $Pass_percentage = $_POST['Pass_percentage'];
    $No_of_attempts = $_POST['No_of_attempts'];
    
    //to prevent from mysqli injection
    function safe($conn,$data){  
        $username = stripcslashes($data);

        $username = mysqli_real_escape_string($conn, $data);  
        return $data;  
    }
    $Test_name = safe($conn, $Test_name );
    // $No_of_subjects =safe($conn, $No_of_subjects);
    $Pass_percentage =safe($conn, $Pass_percentage);
    $No_of_attempts =safe($conn, $No_of_attempts);
    // Check whether this username exists
    $existSql = "SELECT * FROM `test` WHERE Test_name = '$Test_name'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    // Check Whether email already exists;
    $existSql1 = "SELECT * FROM `test` WHERE Test_name = '$Test_name'";
    $result1 = mysqli_query($conn, $existSql1);
    $numExistRows1 = mysqli_num_rows($result1);
    $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);

    if($numExistRows > 0){
        $showError = "Test_name Already Exists";
    }
    elseif($numExistRows1 > 0){
        $showError = "Test_name Already Exists";
    }
    else{
        #$sql = "INSERT INTO `users` (  `password`, `email`, `dt`) VALUES ( '$encrypted', '$email', current_timestamp())";
        #echo $sql;
        $sql = "INSERT INTO `test` ( `Test_name`,  `Pass_percentage`, `No_of_attempts`, `Date_of_creation`) VALUES ( '$Test_name','$Pass_percentage', '$No_of_attempts', current_timestamp() )";
        header("location: question.php");
        $result = mysqli_query($conn, $sql);
       
    
 }
if ($result){
    $showAlert = true;
}
else{
    $showError = "data not inserted in database";
}
}

// }

?>




<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container mt-4">
<!--
<button class="btn btn-primary" type="button" onclick= "location.href ='login.php'">Login</button> 

or
<button class="btn btn-primary" type="button" >SignUp</button>
-->

<div >
<form action = "create_test.php" method = "post" class = "mt-2" name = 'f1' onsubmit = "return validation()">
<center> <strong style = " font-size :30px">Test</strong></center>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Test Name<span class = "error">*</span></label>
    <input type="text" class="form-control" name = "Test_name" placeholder="Enter Test Name">
    
    
</div>



<div class="mb-3">
    <label for="percentage" class="form-label">Pass Percentage</label>
    <input type="percentage" class="form-control" id="address" name ="Pass_percentage" Placeholder="Enter Passing Percentage">
</div>
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">No. of attempts</label>
    <input type="number" class="form-control" id="exampleInputtext" name="No_of_attempts"placeholder=" Enter No.of attempts ">
</div>



<button type="submit"  name ="submit" class="btn btn-primary">Submit</button> 

</form>
</div>

</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>