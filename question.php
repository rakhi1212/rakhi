<?php


$showAlert = false;
$showError = false;
$No_of_questionsErr="";
$questionErr="";
$option1Err="";
$option2Err="";
$option3Err="";
$option4Err="";
$answerErr="";



$No_of_questions="";
$question="";
$option1="";
$option2="";
$option3="";
$option4="";
$answer="";



    

if($_SERVER["REQUEST_METHOD"] == "POST"){      
    include 'configuration.php' ; 
    $conn = $conn; 

    // if($_POST['submit']){

    
    
   $No_of_questions = $_POST['No_of_questions'];

    $question= $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer= $_POST['answer'];
    
    
    //to prevent from mysqli injection
    function safe($conn,$data){  
        $username = stripcslashes($data);

        $username = mysqli_real_escape_string($conn, $data);  
        return $data;  
    }
    $No_of_questions = safe($conn, $No_of_questions );
    // $No_of_subjects =safe($conn, $No_of_subjects);
    $question=safe($conn, $question);
    $option1=safe($conn, $option1);
    $option2=safe($conn, $option2);
    $option3=safe($conn, $option3);
    $option4=safe($conn, $option4);
    $answer =safe($conn, $answer);
    // Check whether this username exists
    $existSql = "SELECT * FROM `question` WHERE question= '$question'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    // Check Whether email already exists;
    $existSql1 = "SELECT * FROM `question` WHERE question = '$question'";
    $result1 = mysqli_query($conn, $existSql1);
    $numExistRows1 = mysqli_num_rows($result1);
    $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);

    if($numExistRows > 0){
        $showError = "question Already Exists";
    }
    elseif($numExistRows1 > 0){
        $showError = "question Already Exists";
    }
    else{
        #$sql = "INSERT INTO `users` (  `password`, `email`, `dt`) VALUES ( '$encrypted', '$email', current_timestamp())";
        #echo $sql;
        $sql = "INSERT INTO `question`(`No_of_question`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES ( '$No_of_questions','$question','$option1','$option2','$option3','$option4','$answer')";
        #$sql = "INSERT INTO `question` ( `No_of_questions`,  `question`, `option1`,`option2`,`option3`,`option4`,`answer`) VALUES ( '$No_of_questions','$question','$option1','$option2','$option3','$option4','$answer')";
        
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

<!doctype html>
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

<form action = "question.php" method = "post" class = "mt-2" name = 'f1' onsubmit = "return validation()">
<center> <strong style = " font-size :30px">Create Questions</strong></center>

    <div class="mb-3">

        <label for="exampleInputEmail1" class="form-label">No. of questions<span class = "error">*</span></label>
        <input type="number" class="form-control" name = "No_of_questions"placeholder="Enter No. of Questions ">
        <!--  if Email is invalid-->
        <span class="error"> <?php echo $No_of_questionsErr;?></span>
        
    </div>
    <div class="mb-3">
        <label for="exampleInputText1" class="form-label">Question</label>
        <input type="text" class="form-control" id="exampleInputText" name = "question" placeholder="Enter Question">
        <span class="error"> <?php echo $questionErr;?></span>
    </div>

    <div class="mb-3">
        <label for="option1" class="form-label">Option1</label>
        <input type="text"  id="option1" name = "option1">
        <span class="error"> <?php echo $option1Err;?></span>

        <label for="option2" class="form-label">Option2</label>
        <input type="text"  id="option2" name = "option2" >
        <span class="error"> <?php echo $option2Err;?></span>

        <label for="option3" class="form-label">Option3</label>
        <input type="text"  id="option3" name = "option3" >
        <span class="error"> <?php echo $option3Err;?></span>

        <label for="option4" class="form-label">Option4</label>
        <input type="text"  id="option4" name = "option4" >
        <span class="error"> <?php echo $option4Err;?></span>
    </div>
    <div class="mb-3">
        <label for="exampleInputText1" class="form-label">Answer</label>
        <input type="number" class="form-control" id="exampleInputText" name = "answer"placeholder="Enter Answer">
        <span class="error"> <?php echo $answerErr;?></span>
    </div>



    <button type="submit" name="submit" class="btn btn-primary">Submit</button> 

</form>
</div>

</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>