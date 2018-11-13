<?php

$qklassekode=$_GET["classcode"];


$filnavn="filer/student.txt";

$filoperasjon="r"; 

$fil=fopen($filnavn, $filoperasjon);

while($linje=fgets($fil))							
{
	if($linje!="")
	{
        
        
	$del=explode(";",$linje);
    $brukernavn=$del[0];
	$fornavn=$del[1];
	$etternavn=$del[2];
    $klassekode=$del[3];
        
        
	
    if($qklassekode == $klassekode)  {
        
        print("<p>$fornavn $etternavn<br /></p>");	
	}	
        
        }
}	

?>