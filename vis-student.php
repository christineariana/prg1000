<!DOCTYPEhtml>
    
    <head>
    
        <meta charset="utf-8">
        <title>Oversikt over registrerte studenter</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="script.js"></script>
        
    </head>
    
    <nav>
                <a href="index.html">Hjem</a>
                <a href="registrer-klasse.php">Registrer klasse</a>
                <a href="registrer-student.php">Registrer student</a>
                <a href="vis-student.php">Vis registrerte klasser og studenter</a>
                <a href="vis-klasseliste.php">Vis klasseliste</a>
    </nav>

<div id="vis-student">


<section class="php left">
    
<?php

$filnavn="filer/student.txt";

$filoperasjon="r"; 

print("<h1>Følgende studenter er registrerte:</h1>");

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
	print("$brukernavn $fornavn $etternavn $klassekode <br />");	
	}	    
}							

fclose($fil); 	
    
?>

    </section>
    
  <section class="php right">

<?php

$filnavn="filer/klasse.txt";

$filoperasjon="r"; 

print("<h1>Følgende klasser er registrerte:</h1>");

$fil=fopen($filnavn, $filoperasjon);

while($linje=fgets($fil))							
{
	if($linje!="")
	{
	$del=explode(";",$linje);
	$klassekode=$del[0];
	$klassenavn=$del[1];
	print("$klassekode $klassenavn <br>");	
	}	    
}

?>
    
   
      
        
</section>
    </div>


 <footer>Oppgaven er levert av Christine Ariana H. Vedvik. Obligatorisk innlevering ITIS18, PRG1000.</footer>