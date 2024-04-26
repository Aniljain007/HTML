<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <script>
      function validateform(){  
            var fp=document.form.password.value;  
            var cp=document.form.confirmpassword.value; 
            if(fp!=cp) {
            alert("password and Re type password must match ");
            return false;
            }
            }  
    </script>
    <script>

    </script>
</head>
<body>
<?php
    require('db1.php');
    if (isset($_POST['email'])) {
        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($con,$_POST['lastname'] );
        $email    = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $subject = mysqli_real_escape_string($con, $_POST['subject']);
        $topic = mysqli_real_escape_string($con, $_POST['topic']);
        $check = "SELECT *  FROM table1 where email='$email'";
        $resul   = mysqli_query($con, $check) or die(mysql_error());
        $rows = mysqli_num_rows($resul);
        
        if ($rows >= 1) {
            echo "<div class='form'>
            <h3>your email is already taken please give another one.</h3><br/>
            <p class='link'>Click here to <a href='registration1.php'>register</a> again.</p>
            </div>";
        }
        
        else{   
        $query    = "INSERT into `table1` (firstname, laststname, email, password, subject,topic)
                     VALUES ('$firstname','$lastname',  '$email','" . md5($password) . "','$subject','$topic')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login1.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration1.php'>registration</a> again.</p>
                  </div>";
        }
            }
    } else {
    
?>
    <form name="form" class="form" method="post" action="" onsubmit="return validateform()">
        <h1 class="login-title">Course Registration</h1>
        <label for="firstname">FirstName</label>
        <input type="text"  class="login-input" name="firstname" pattern="[A-Za-z]{3,}" title="first name atleast contain 3 letters" placeholder="First Name" required />
        <label for="lastname">LastName</label>
        <input type="text"  class="login-input" name="lastname" pattern="[A-Za-z]{3,}" title="last name atleast contain 3 letters" placeholder="Last Name" required />
        <label for="email">Email</label>
        <input type="text"  class="login-input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="please enter valid last name" placeholder="Enter your email" required />
        <label for="password">Password</label>
        <input type="password"  class="login-input" name="password" pattern="(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="password must containd 1 caps 1 num and 1 special character and atleast 8 characters" placeholder="Password" required>
        <label for="confirmpassword">Retype password</label>
        <input type="password"  class="login-input" name="confirmpassword" placeholder=" Confirm Password" required>
        <label for="subject">Subject   :</label>
        <select name="subject"  id="subject" required>
        <option value="" selected="selected">Select subject</option>
        </select>
        <br><br>
        <label for="topic">Sub Subject:</label>
        <select name="topic" id="topic" required>
        <option value="" selected="selected">select sub subject</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Register" class="login-button"  >
    </form>
    <p class="link">Already have an account? <a href="login1.php">Login here</a></p>
<?php
    } 
?>
  
</body>
</html>
