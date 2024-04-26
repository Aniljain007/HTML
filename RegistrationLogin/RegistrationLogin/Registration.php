<!--
Into this file, we create a layout for registration page.
-->
<?php
include_once('header.php');
include_once('link.php');
?>

<div id="frmRegistration">
<form class="form-horizontal" action="registration_code.php" method="POST">
	<h1>User Registration</h1>
	<div class="form-group">
    <label class="control-label col-sm-2" for="firstname">First Name:</label>
    <div class="col-sm-6">
      <input required type="text" name="firstname" pattern="[A-Za-z]{3,}" class="form-control" id="firstname" placeholder="Enter Firstname">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Last Name:</label>
    <div class="col-sm-6">
      <input required type="text" name="lastname" pattern="[A-Za-z]{3,}" class="form-control" id="lastname" placeholder="Enter Lastname">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input required type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6">
      <input required type="password" name="password" pattern="(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
		<div class="col-sm-6">
			<input required type="password" name="cpassword" class="form-control" id="cpwd" placeholder="Enter password">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="membership">Category</label>
		<div class="col-sm-6">
			<select class="form-select" name="category" id="country">
										<option value="">- Select Category -</option>
										</div>
									</div>
											<div class="form-group">
		<label class="control-label col-sm-2" for="membership">Choose a SubDepartment:</label>
												<div class="col-sm-6">
											<select name="Subdepartment" id="Subdepartment">
											<option value="EC">EC</option>
											<option value="EE">EE</option>
											<option value="ME" selected>ME</option>
											<option value="CS">CS</option>
										</select><br>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="captcha">Captcha</label>
									<div class="col-sm-6">
								<input type="text" class = "captcha" name="captcha" value="<?php echo substr(uniqid(), 5); ?>"> <br>
                      <input type="text" name="confirmcaptcha" placeholder="Captcha" value=""> <br>
  <div class="form-group">
    <div class="control-label col-sm-5">

      <button type="submit" name="create" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</div>
