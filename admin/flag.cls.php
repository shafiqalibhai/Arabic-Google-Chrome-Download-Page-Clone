<?php
/*
This class help you to find the exact flag 
for almost any country of the world
222 flags available
Auteur : Carron Tristan
Dernière modif : 14 august 2006
email : alf-red@phpswiss.ch
*/

class FLAG
{
	// this function return all the data include in the .txt file
	function GetFile() 
	{	
		return $file = file("./land.txt") ;
	}
	
	//this function display a combo box off all the country of the world
	function comboland($id="ch")// define switzerland by default
	{
		$aland = FLAG::GetFile() ;

		echo "<select name=\"country\">";
		for($i=0 ; $i<count($aland) ; $i++)
		{
			$string = explode(":", $aland[$i]);
			
			if($id == $string[0])
				echo "<option selected value=\"$string[0]\" >$string[1]<br>";
			else
				echo "<option value=\"$string[0]\" >$string[1]<br>";
				
			if($i%10==0)
				echo "<br><br>";
		}
		echo "</select>";
	}
	
	// this function display a flag from an id
	function DisplayFlag($id)
	{
		if($id == '')
			$id = "ch" ; // define switzerland by default
			
		echo "<img src='flags/$id.gif'>" ;
	}
	
	// this function return the name of a country while given the id
	function GetCountryNameById($id)
	{
		if($id == '')
			$id = "ch" ; // define switzerland by default
			
		$aland = FLAG::GetFile() ;
		
		for($i=0 ; $i<count($aland) ; $i++)
		{
			$string = explode(":", $aland[$i]);
			
			if($id == $string[0])
				$name = $string[1] ;
		}
		return $name ;
	}
	
	//this function return the if of a country while giving the name
	function GetCountryIdByName($name)
	{
		if($name == '')
			$name = "Switzerland" ; // define switzerland by default
			
		$aland = FLAG::GetFile() ;
		
		for($i=0 ; $i<count($aland) ; $i++)
		{
			$string = explode(":", $aland[$i]);
			
			if($name == $string[1])
				$id = $string[0] ;
		}
		return $id ;
	}
}
?>