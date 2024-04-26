<!--
Here, we write code for registration.
-->
<?php
require_once('connection.php');
$fname = $lname = $email = $password = $pwd = '';

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);
$captcha = $_POST["captcha"];
	$confirmcaptcha = $_POST["confirmcaptcha"];

	if ($password == $cpassword )
		{
if( $captcha == $confirmcaptcha){
	      $sql = "SELECT * FROM tbluser WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
					echo "<script>alert('email already taken')</script>";
					exit();
				}else{
$sql = "INSERT INTO tbluser (Firstname,Lastname,Email,Password) VALUES ('$fname','$lname','$email','$password')";
$result = mysqli_query($conn, $sql);
}
if($result)
{
	header("Location: login.php");
}
else
{
echo "Error :".$sql;
}
}
else{
	echo "<script>alert('invalid captcha')</script>";
}
}
else{
	echo "<script>alert('Password and confirm password does not match ')</script>";
}


?>
