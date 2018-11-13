<!-- HTML FORMEN FOR UTFYLLING AV INFO -->

<!DOCTYPE html>
    
    <head>
    
        <meta charset="utf-8">
        <title>Registrering av klasse</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        
    </head>
    
    <nav>
                <a href="index.html">Hjem</a>            
                <a href="registrer-klasse.php">Registrer klasse</a>
                <a href="registrer-student.php">Registrer student</a>
                <a href="vis-student.php">Vis registrerte klasser og studenter</a>
                <a href="vis-klasseliste.php">Vis klasseliste</a>
    </nav>
    
    <body>
        
        <div id="registrer-klasse">
        
        <section class="php">


        <h1>Registrering av klasse</h1>

        <p>Vennligst fyll inn informasjonen under</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="registrerklasse" onsubmit="return validateForm()">
    
                <table>
                    <tr>
                        <td>Klassekode</td>
                        <td>Klassenavn</td>
                    </tr>
                    <tr>
                        <td><input style="width:180px;" class="classcode" id="classcode" name="classcode" type="text">
                            <span class="error hidden" id="classcode_error">Klassekoden må fylles ut</span>
                            <span id="hover_code" class="tooltip" style="display:none">To store bokstaver og et tall.</span>
                        </td> 
                        
                        <td><input style="width:180px;" class="classname" id="classname" name="classname" type="text">
                            <span class="error hidden" id="classname_error">Klassenavn må fylles ut</span>
                            <span id="hover_name" class="tooltip" style="display:none">Klassenavn inkl. år</span>
                        </td> 
                        
                        <td><input type="submit" value="Registrer klasse" required ></td>
                        <td><input type="reset" value="Nullstill" name="nullstill"/></td>
                    </tr>
                </table>

            </form>
            
<script type="text/javascript">
    
        /* TOOLTIP */
    
    var e = document.getElementById('classcode');
e.onmouseover = function() {
  document.getElementById('hover_code').style.display = 'block';
}
e.onmouseout = function() {
  document.getElementById('hover_code').style.display = 'none';
}

    var e = document.getElementById('classname');
e.onmouseover = function() {
  document.getElementById('hover_name').style.display = 'block';
}
e.onmouseout = function() {
  document.getElementById('hover_name').style.display = 'none';
}

/* JS VALIDERING AV INPUT */

    
    function validateForm() {

    var code = document.getElementById("classcode").value;
    var errormessage_code = document.getElementById("classcode_error");
        
    var hasError = false;
        
    if (code == "") {
        errormessage_code.style.display = "block";
        errormessage_code.style.color = "red";
        
        hasError = true;
    }
    
    else {
            
        errormessage_code.style.display = "none";
        hasError = false; 
        
    }
        
    
    var name = document.getElementById("classname").value;
    var errormessage_name = document.getElementById("classname_error");

    if (name == "") {
        errormessage_name.style.display = "block";
        errormessage_name.style.color = "red";
        
        hasError = true;
    }
    
    else {
            
        errormessage_name.style.display = "none";
        hasError = hasError || false; 
        
    }
        
        return !hasError
    
}

            </script>
<?php

/* REGISTRERE KLASSE*/

$klassekode=$_POST["classcode"];
$klassenavn=$_POST["classname"];

$filnavn="filer/klasse.txt";

if(!$klassekode || !$klassenavn) {
    
    print("");
}

else
{
	$filoperasjon="a"; /* filoperasjon a for append/tilføying */
	$linje=$klassekode. ";" .$klassenavn. ";" . "\n";

	$fil=fopen($filnavn,$filoperasjon);
	fwrite($fil,$linje);
	fclose($fil);

	print("");
}

/* PHP VALIDERING AV UTFYLLELSE */

    $classcodeErr = $classnameErr = "";
    $classcode = $classname = "";

    if ($_SERVER["POST"] == "POST") {
      
        
        if (empty($_POST["classcode"])) {
        $classcodeErr = "Klassekode kreves";
      } 
        
        else {
        $classecode = test_input($_POST["classcode"]);
      }

      if (empty($_POST["classname"])) {
        $classnameErr = "Klassenavn kreves";
      } 
        
        else {
        $classname = test_input($_POST["classname"]);
      }

    }

/* PHP VALIDERING AV KLASSEKODE */

$klassekode=$_POST ["classcode"];

$lovligKlassekode=true;
        
    if (!$klassekode)  {
   
        $lovligKlassekode=false;
        print("");

}   
    else if (strlen($klassekode)!=3) {
        
        $lovligKlassekode=false;
        print("Klassekode består ikke av 3 tegn <br />");
}   
    else
    
    {
        
        $tegn1=$klassekode[0];   /* første tegn i klassekoden  */
        $tegn2=$klassekode[1];   /* andre tegn i klassekoden  */
        $tegn3=$klassekode[2];   /* tredje tegn i klassekoden  */
          
        if (!ctype_alpha($tegn1))  /* tegn1 er ikke bokstav */ { 
              
                $lovligKlassekode=false;
                print("Første tegn er ikke stor bokstav <br />");
        }
          
        if (!ctype_alpha($tegn2))  /* tegn2 er ikke bokstav */{
              
                $lovligKlassekode=false;
                print("Andre tegn er ikke stor bokstav <br />");
        }
          
        if (!ctype_digit($tegn3))  /* tegn3 er ikke et siffer */ {
                    
                $lovligKlassekode=false;
                print("Siste tegn er ikke et siffer  <br />");
        }
    }

        if ($lovligKlassekode){
            
                print("Klassen er registrert! <br />");
        }



?>

      </section>
            </div>
        
  <footer>Oppgaven er levert av Christine Ariana H. Vedvik. Obligatorisk innlevering ITIS18, PRG1000.</footer> 
        
    </body>