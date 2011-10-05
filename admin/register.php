<?php include"include/session.php" ?>
<?php include"header.php" ?>
<?php include "menu.php" ?>
<div id="content">
<div class="left"> 

<h2>
<a href=""></a>

</h2>
<div class="articles">
<?php 
include "connectdb.php";
$username=htmlspecialchars($_POST['user'],ENT_QUOTES);
$password=md5($_POST['password']);
//$firstname = $_POST['firstname'];
//$lastname = $_POST['lastname'];
//$age = $_POST['age'];
//$ip = $_SERVER['REMOTE_ADDR'];

//$result = mysql_num_rows(mysql_query("SELECT * FROM tbl_user WHERE user_name='$username'"));
//if($result == 1)
  //  {
  //  echo '<h1>ERROR!</h1>The username you have chosen already exists!';
  //  }
//else
 //   {
	mysql_query("INSERT INTO `tbl_user` (`user_id` ,`user_name` ,`password`) VALUES (NULL ,'$username', '$password')");

   // echo '<p>Congratulations! You have successfully registered!</p><p>Click <a href="login.php">here</a> to login.</p>';
//	}
  ?>
<link rel="stylesheet" type="text/css" href="stylesheets/validationEngine.jquery.css" media="screen" />
<script src="scripts/jquery.validationEngine.js" type="text/javascript"></script>

		<form id="formID" class="formular" method="post" action="index.php?page=Register">
			<fieldset>
				<label>
					<span>Desired username : </span>
					<input class="validate[optional,custom[noSpecialCaracters],length[0,20]] text-input" type="text" name="user" id="user" />
				</label>
				<label>
					<span>First name : </span>
					<input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="firstname" id="firstname" />
				</label>
				<label>
					<span>Last name : </span>
					<input class="validate[required,custom[onlyLetter],length[0,100]] text-input" type="text" name="lastname" id="lastname" />
				</label>
				<div>
					<span>Radio Groupe : <br /></span>
					<span>radio 1: </span>
					<input class="validate[required] radio" type="radio"  name="radiogoupe"  id="radio1"  value="5">
					<span>radio 2: </span>
					<input class="validate[required] radio" type="radio" name="radiogoupe"  id="radio2"  value="3"/>
					<span>radio 3: </span>
					<input class="validate[required] radio" type="radio" name="radiogoupe"  id="radio3"  value="9"/>
				</div>
				<div>
					<span>Max 2 checkbox : <br /></span>
				
					<input class="validate[minCheckbox[2]] checkbox" type="checkbox"  name="checkboxgroupe" id="maxcheck1" value="5">
					
					<input class="validate[minCheckbox[2]] checkbox" type="checkbox" name="checkboxgroupe" id="maxcheck2"  value="3"/>
				
					<input class="validate[minCheckbox[2]] checkbox" type="checkbox" name="checkboxgroupe" id="maxcheck3"  value="9"/>
				</div>
				<label>
					<span>Date : (format YYYY-MM-DD)</span>
					<input class="validate[required,custom[date]] text-input" type="text" name="date"  id="date" />
				</label>
				<label>
					<span>Favorite sport 1:</span>
				<select name="sport" id="sport"  class="validate[required]"  id="sport"  >
					<option value="">Choose a sport</option>
					<option value="option1">Tennis</option>
					<option value="option2">Football</option>
					<option value="option3">Golf</option>
				</select>
				</label>
				<label>
					<span>Favorite sport 2:</span>
				<select name="sport2" id="sport2" multiple class="validate[required]"  id="sport2"  >
					<option value="">Choose a sport</option>
					<option value="option1">Tennis</option>
					<option value="option2">Football</option>
					<option value="option3">Golf</option>
				</select>
				</label>
				<label>
					<span>Age : </span>
					<input class="validate[required,custom[onlyNumber],length[0,3]] text-input" type="text" name="age"  id="age" />
				</label>
					
				<label>
					<span>Telephone : </span>
					<input class="validate[required,custom[telephone]] text-input" type="text" name="telephone"  id="telephone" />
				</label>
			</fieldset>
			<fieldset>
				<label>
					<span>Password : </span>
					<input class="validate[required,length[6,11]] text-input" type="password" name="password"  id="password" />
				</label>
				<label>
					<span>Confirm password : </span>
					<input class="validate[required,confirm[password]] text-input" type="password" name="password2"  id="password2" />
				</label>
			</fieldset>
			<fieldset>
				<label>
					<span>Email address : </span>
					<input class="validate[required,custom[email]] text-input" type="text" name="email" id="email"  />
				</label>
				<label>
					<span>Confirm email address : </span>
					<input class="validate[required,confirm[email]] text-input" type="text" name="email2"  id="email2" />
				</label>
			</fieldset>
			<fieldset>
				<label>
					<span>Comments : </span>
					<textarea class="validate[required,length[6,300]] text-input" name="comments" id="comments" /> </textarea>
				</label>

			</fieldset>
			<fieldset>
				<div class="infos">Checking this box indicates that you accept terms of use. If you do not accept these terms, do not use this website : </div>
				<label>
					<span class="checkbox">I accept terms of use : </span>
					<input class="validate[required] checkbox" type="checkbox"  id="agree"  name="agree"/>
				</label>
			</fieldset>
<input class="submit" type="submit" value="Validate & Send the form!"/>
<hr/>
</form>


</div>
</div>
<?php include "rightnav.php" ?>
<div style="clear: both;"> </div>
</div>
<?php include "footer.php" ?>