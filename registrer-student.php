<!-- HTML FORMEN FOR UTFYLLING AV INFO -->

<!DOCTYPE html>
    
    <head>
    
        <meta charset="utf-8">
        <title>Registrering av student</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="script.js"></script>
        <script src="jquery-3.3.1.min.js"></script>
        
    </head>
    
    <nav>
                <a href="index.html">Hjem</a>
                <a href="registrer-klasse.php">Registrer klasse</a>
                <a href="registrer-student.php">Registrer student</a>
                <a href="vis-student.php">Vis registrerte klasser og studenter</a>
                <a href="vis-klasseliste.php">Vis klasseliste</a>
    </nav>
    
    <body>
    
    <div id="registrer-student">
        <section class="php">
            
    <h1>Registrering av student</h1>

        <p>Vennligst fyll inn informasjonen under</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="registrerstudent" onsubmit="return validateForm()">
    
                <table>
                    <tr>
                        <td>Brukernavn</td>
                        <td>Fornavn</td>
                        <td>Etternavn</td>
                        <td>Klassekode</td>
                    </tr>
                    <tr>
                        <td><input style="width:180px;" class="username" id="username" name="username" type="text">
                            <span class="error hidden" id="username_error">Brukernavn må fylles ut</span> 
                            
                            <span id="hover_username" class="tooltip" style="display:none">Studentnummer</span>
                        </td>
                        
                        <td><input style="width:180px;" class="firstname" id="firstname" name="firstname" type="text">
                            <span class="error hidden" id="firstname_error">Fornavn må fylles ut</span> 
                            
                            <span id="hover_firstname" class="tooltip" style="display:none">Fornavn og mellomnavn</span>
                        </td>
                        
                        <td><input style="width:180px;" class="lastname" id="lastname" name="lastname" type="text">
                            <span class="error hidden" id="lastname_error">Etternavn</span> 
                            
                            <span id="hover_lastname" class="tooltip" style="display:none">Etternavn må fylles ut</span>
                            </td> 
                        
                        <td><input style="width:180px;" class="classcode_student" id="classcode_student" style="width:200px;" name="classcode" type="text">
                            <span class="error hidden" id="classcode_error">Klassekode må fylles ut</span><div id="classlist"></div> 
                            
                            <span id="hover_code_student" class="tooltip" style="display:none">To store bokstaver og et tall</span>
                        </td> 
                        
                        <td><input type="submit" value="Registrer student" required></td>
                        <td><input type="reset" value="Nullstill skjema" name="nullstill"/></td> 
                    </tr> 
                </table>
                
                

            </form>
            
<script type="text/javascript">
    
    /* TOOLTIP */
    
        var e = document.getElementById('username');
e.onmouseover = function() {
  document.getElementById('hover_username').style.display = 'block';
}
e.onmouseout = function() {
  document.getElementById('hover_username').style.display = 'none';
}

    var e = document.getElementById('firstname');
e.onmouseover = function() {
  document.getElementById('hover_firstname').style.display = 'block';
}
e.onmouseout = function() {
  document.getElementById('hover_firstname').style.display = 'none';
}

    var e = document.getElementById('lastname');
e.onmouseover = function() {
  document.getElementById('hover_lastname').style.display = 'block';
}
e.onmouseout = function() {
  document.getElementById('hover_lastname').style.display = 'none';
}

    var e = document.getElementById('classcode_student');
e.onmouseover = function() {
  document.getElementById('hover_code_student').style.display = 'block';
}
e.onmouseout = function() {
  document.getElementById('hover_code_student').style.display = 'none';
}

/* JS VALIDERING AV INPUT */

    
    function validateForm() {

    var brukernavn = document.getElementById("username").value;
    var errormessage_brukernavn = document.getElementById("username_error");
        
    var hasError = false;
        
    if (brukernavn == "") {
        errormessage_brukernavn.style.display = "block";
        errormessage_brukernavn.style.color = "red";
        
        hasError = true;
    }
    
    else {
            
        errormessage_brukernavn.style.display = "none";
        hasError = false; 
        
    }
        
    
    var fornavn = document.getElementById("firstname").value;
    var errormessage_fornavn = document.getElementById("firstname_error");

    if (fornavn == "") {
        errormessage_fornavn.style.display = "block";
        errormessage_fornavn.style.color = "red";
        
        hasError = true;
    }
    
    else {
            
        errormessage_fornavn.style.display = "none";
        hasError = hasError || false; 
        
    }
        
    var etternavn = document.getElementById("lastname").value;
    var errormessage_etternavn = document.getElementById("lastname_error");

    if (etternavn == "") {
        errormessage_etternavn.style.display = "block";
        errormessage_etternavn.style.color = "red";
        
        hasError = true;
    }
    
    else {
            
        errormessage_etternavn.style.display = "none";
        hasError = hasError || false; 
        
    }
    
    var klassekode = document.getElementById("classcode_student").value;
    var errormessage_klassekode = document.getElementById("classcode_error");

    if (klassekode == "") {
        errormessage_klassekode.style.display = "block";
        errormessage_klassekode.style.color = "red";
        
        hasError = true;
    }
    
    else {
            
        errormessage_klassekode.style.display = "none";
        hasError = hasError || false; 
        
    }
        
        return !hasError
    
}


    function getStudentList () {
        
        var klassekoden = document.getElementById ("classcode_student").value;
        
        var URL = "getstudents.php?classcode="+ klassekoden
        
        $.get(URL,function (HTML) {
            
            document.getElementById("classlist").innerHTML = HTML;
            document.getElementByID("classlist").innerHTML.style.color = "blue";
            
        })
        
    }
    
    
</script>            

<?php

/* REGISTRERE STUDENT */

$brukernavn=$_POST["username"];
$fornavn=$_POST["firstname"];
$etternavn=$_POST["lastname"];
$klassekode=$_POST["classcode"];

$filnavn="filer/student.txt";

if(!$brukernavn || !$fornavn || !$etternavn || !$klassekode)
{
	print("");
}

else
{
	$filoperasjon="a"; /*a ppend - står for å legge til*/
	$linje=$brukernavn. ";" .$fornavn. ";" .$etternavn. ";" .$klassekode. ";" . "\n";

	$fil=fopen($filnavn,$filoperasjon);
	fwrite($fil,$linje);
	fclose($fil);

	print("Studenten er nå registrert! <br />");
}

/* VALIDERING AV UTFYLT FORM */

$usernameErr = $firstnameErr = $lastnameErr = $classcodeErr = "";
$username = $firstname = $lastname = $classcode = "";

if ($_SERVER["POST"] == "POST") {
    
  if (empty($_POST["username"])) {
    $usernameErr = "Brukernavn kreves";
  } else {
    $name = test_input($_POST["username"]);
  }

  if (empty($_POST["firstname"])) {
    $fristnameErr = "Fornavn kreves";
  } else {
    $firstname = test_input($_POST["firstname"]);
  }

  if (empty($_POST["lastname"])) {
    $lastname = "Etternavn kreves";
  } else {
    $lastname = test_input($_POST["lastname"]);
  }

  if (empty($_POST["classcode"])) {
    $classcode = "Klassekode kreves";
  } else {
    $classcode = test_input($_POST["classcode"]);
  }
}
       
?>
            
</section>
        
        </div>
        
<footer>Oppgaven er levert av Christine Ariana H. Vedvik. Obligatorisk innlevering ITIS18, PRG1000.</footer>
    
</body>

