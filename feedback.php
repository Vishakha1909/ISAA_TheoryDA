<!DOCTYPE html>
<html lang="en">

<?php
include("templates/header.php");
?>

<?php
include("templates/nav-out.php");
?>

<?php
require('db.php');
session_start();
if (isset($_POST['email'])) {
    // Removes backslashes
    $fname= stripslashes($_REQUEST['fname']);
    $fname = mysqli_real_escape_string($con, $fname);

    $lname= stripslashes($_REQUEST['lname']);
    $lname = mysqli_real_escape_string($con, $lname);

    $email= stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);

    $feedback= stripslashes($_REQUEST['subject']);
    $feedback = mysqli_real_escape_string($con, $feedback);

    





    $sql = "INSERT INTO feedback (fname,lname,email,feedback) VALUES ('$fname','$lname','$email','$feedback')" ;
    $result = mysqli_query($con, $sql);
    
    if($result){
        echo "<script>alert('Feedback submitted');window.location.href='resultant';</script>";
    }else{
        echo "<script>alert('OOPs Something went wrong');window.location.href='resultant';</script>";
    }



} else {
    ?>
    
    <div class="container">
        <h2>Feedback</h2>
  <form action="" method="POST">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" placeholder="Your name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" placeholder="Your last name.." required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Your EmailID.." required>    
    

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write Feedback.." style="height:200px"></textarea required>

    <input type="submit" value="Submit">

  </form>
</div>


<?php } ?>

<?php
include("templates/footer.php");
?>


</body>

</html>