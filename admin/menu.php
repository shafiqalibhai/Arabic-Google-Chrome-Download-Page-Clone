<div id="menu">
<?php if($session->logged_in){ ?>
<ul>
<li><a href="index.php">Home</a></li>
 <li><a href="statistics.php">Statistics</a></li>
<!-- <li><a href="">Generate Toolbar</a></li> -->
<!-- <li><a href="">About</a></li> -->
<!-- <li><a href="">Contact Us</a></li> -->
<li><a href="userinfo.php?user=<?=$session->username?>">My Account</a></li>
<li><a href="useredit.php">Edit Account</a></li>
<?php //if($session->isAdmin()){   echo "<li><a href=\"admin.php\">Admin Center</a></li>"; } ?>
<li><a href="process.php">Logout</a></li>

</ul>
<?php } else { ?>
<ul>
<li><a href="index.php">Home</a></li>
<!-- <li><a href="register.php">Register</a></li> -->
<li><a href="login.php">Login</a></li> 
</ul>
<?php } ?>
</div>
