<!-- HTML FORMEN FOR UTFYLLING AV INFO -->  

<!DOCTYPE html>

   <head>
    
        <meta charset="utf-8">
        <title>Oversikt per klasse</title>
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

    <body>
        
        <div id="vis-klasseliste">
        <section class="php">
        
        <h1> Klasseoversikt </h1>


            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="visklassekliste">
                <table>
                    <tr>
                        <td>Klassekode</td>
                    </tr>  
                    <tr>
                        <td>  <input style="width:180px;" id="classcode" style="width:200px;" type="text" name="klassekode" required/>
                            <span id="hover_code_list" class="tooltip" style="display:none">To store bokstaver og et tall</span>
                        </td>
                        
                        <td>  <input type="submit" value="Se studenter i klassen" name="submit"/>
                        </td>
                        
                        <td>  <input type="reset" value= "Nullstill" name="nullstill"/>
                        </td>
                    </tr>
                </table>

            </form>
            
        <footer>Oppgaven er levert av Christine Ariana H. Vedvik. Obligatorisk innlevering ITIS18, PRG1000.</footer>

            
            
<script type="text/javascript">
    
        /* TOOLTIP */
    
            var e = document.getElementById('classcode');
        
    
            e.onmouseover = function() {
          
                document.getElementById('hover_code_list').style.display = 'block';
        }
            
        
            e.onmouseout = function() {
          
                document.getElementById('hover_code_list').style.display = 'none';
        }


</script>
            
            
<?php  

            if (!isset($_POST["submit"])) return;

            $filnavn="filer/student.txt";

            $klassekode=$_POST["klassekode"];

            $filoperasjon="r";

                    print ("");

         
            $fil = fopen($filnavn, $filoperasjon); 
                    while ($linje = fgets ($fil))  
    {
                    if ($linje != ";")  
        {   
			         $del = explode (";" , $linje);
			         $registrertNavn=trim($del[3]); 
                    if ($registrertNavn==$klassekode) 
			{
				        $brukernavn=$del[0];
                        $fornavn=$del[1]; 
                        $etternavn=$del[2];
                        $klassekode=$del[3]; 
                  
                    print ("$brukernavn $fornavn $etternavn $klassekode <br/>");
            }
        }
    }

/* VALIDERING AV INPUT, to bokstaver og et tall */

$klassekode=$_POST ["klassekode"];

$lovligKlassekode=true;

    if (!$klassekode)  {
   
    $lovligKlassekode=false;print("Klassekode er ikke fylt ut <br />");

}   
    else if (strlen($klassekode)!=3) {
        
    $lovligKlassekode=false;print("Klassekode består ikke av 3 tegn <br />");
}   
    else 
    
    {
        
        $tegn1=$klassekode[0];   /* første tegn i klassekoden  */
        $tegn2=$klassekode[1];   /* andre tegn i klassekoden  */
        $tegn3=$klassekode[2];   /* tredje tegn i klassekoden  */
          
        if (!ctype_upper($tegn1))  /* tegn1 er ikke bokstav */ { 
              
                $lovligKlassekode=false;
                print("Første tegn er ikke en stor bokstav <br />");
        }
          
        if (!ctype_upper($tegn2))  /* tegn2 er ikke bokstav */{
              
                $lovligKlassekode=false;
                print("Andre tegn er ikke en stor bokstav <br />");
        }
          
        if (!ctype_digit($tegn3))  /* tegn3 er ikke et siffer */ {
                    
                $lovligKlassekode=false;
                print("Siste tegn er ikke et siffer  <br />");
        }
    }

    if ($lovligKlassekode){
            
        print("</br>Studenter listet over er registrert i denne klassen.");
    }


        fclose($fil); 

?>

</section>
        </div>

        
        </body>