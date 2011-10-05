<?php if($session->logged_in){ ?>

<div class="right"> 
<h2>Downloads per Day :</h2>
<ul>
<li>Downloads Today : <?=$database->downloadsToday();?></li> 
<li>Total Downloads Till Date : <?=$database->totalDownloads();?></li> 
<li></li> 
</ul>



<?php 

if ( $_GET["date-from"] == $_GET["date-to"]) {
echo '<h2></h2><ul>';
}
else {

echo '<h2>Downloads per Country :</h2><ul>';

if ( isset($_GET["date-from"])) {
$from = $_GET["date-from"];
$to = $_GET["date-to"];

$count = $database->selectCountries2($from, $to);
}
else {
$count = $database->selectCountries();
}

include("flag.cls.php") ;

// initialize the class FLAG
$flag = new FLAG() ;

function  titleCase($string)  { 
        $len=strlen($string); 
        $i=0; 
        $last= ""; 
        $new= ""; 
        $string=strtoupper($string); 
        while  ($i<$len): 
                $char=substr($string,$i,1); 
                if  (ereg( "[A-Z]",$last)): 
                        $new.=strtolower($char); 
                else: 
                        $new.=strtoupper($char); 
                endif; 
                $last=$char; 
                $i++; 
        endwhile; 
        return($new); 
}; 

foreach($count as $country => $cardinality){
//$country = trim(ucwords(strtolower($country)) );
$country = titleCase($country);
//$country = str_replace(' ','%20',$country);
$country_id = $flag->GetCountryIdByName($country);
$flag_file = $flag->DisplayFlag($country_id);

echo '<li>'.$flag_file.$country.'&nbsp;->&nbsp;'.$cardinality.'</li>';
}
}
?> 
</ul>
</div>
<?php }  ?>