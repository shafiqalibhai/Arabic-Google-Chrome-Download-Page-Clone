<?php include"include/session.php" ?>
<?php include"header.php" ?>
<?php include "menu.php" ?>
<div id="content">
<div class="left"> 

<h2>
<a href=""></a>

</h2>
<div class="articles">
<form action="statistics.php" method="get" name="statistics_date" style="background: #E4EcF5; padding: 15px; margin: 0;border: solid 05px #39c; width:445px;" name="form1" id="form1">
<input type="text" id="datepicker-from" name="date-from" value="from" size="12">
<br />
<p class="box_title"> <-- Select Date Range Please</p>
<br />
<input type="text" id="datepicker-to" name="date-to" value="to"  onChange="submit()" size="12">
</form>
<br /><br />

<?php

// Performing SQL query
$query = 'SELECT * FROM tracked_data WHERE `date` >= "'.$_GET["date-from"].'" AND `date` <= "'.$_GET["date-to"].'" ORDER BY `date` DESC';
//$query = 'SELECT * FROM tracked_data';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
?>
<?php
if ( $_GET["date-from"] != "") {
 if($session->logged_in){ 
// Printing results in HTML
echo '<table id="box-table-a" border="0" style="background: #E1E8F2; padding: 15px; margin: 0;border: solid 05px #069;" >';
echo "<thead><tr><th scope=\"col\">";
echo "id</th><th scope=\"col\">ip</th><th scope=\"col\">date</th><th scope=\"col\">country</th> <tbody>";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</tbody></table>\n";
}
// Free resultset
//mysql_free_result($result);

// Closing connection
//mysql_close($link);
}
?>
</div>
</div>
<?php include "rightnav.php" ?>
<div style="clear: both;"> </div>
</div>
<?php include "footer.php" ?>