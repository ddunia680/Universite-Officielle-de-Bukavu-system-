<!DOCTYPE html>
<html>
<head>
	<title>RegisterStudent</title>
	<style type="text/css">
		body{
			background-image: url("cover.jpg");
		}
		div.scroll {
			background-color: lightblue;
			width: 70%;
			height: 500px;
            text-align: center;
			overflow-x: hidden;
			overflow-y: auto;
			padding: 20px;
			border-radius: 10px;
			border-style: solid;
			margin-left: 13%;
			position: relative;

		}
	</style>

</head>
<body onload="default_p()">

	<div class="scroll" align="center">
		<h1 align="center" style="color: red;">Universite Officielle de Bukavu</h1>
		<h2 align="center">Fiche d'inscription pour etudiant</h2>
		<h3 align="center">Veuillez completer les cases ci apres:</h3>
	  </br></br>
        <h4 align="center">Cette fiche ne doit etre complete qu'une fois que le candidat aura depose tout les documents demandes </h4>

		<table cellpadding="5" cellspacing="5" align="center">
			<thead></thead>
			<tbody>
			<form method="POST" action="RegisterStudent.php" enctype="multipart/form-data"/>
				<tr>
					<td>Photo Passeport:</td>
					<td><input type="file" name="passeport" id="passeport"></td>
				</tr>
				<tr>
					<td>Nom complet:</td>
					<td><input type="text" name="nom" id="nom" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Sexe:</td>
					<td>Masculin<input type="Radio" name="sex" value="Masculin">    Feminin<input type="Radio" name="sex" value="Feminin"></td>
				</tr>
				<tr>
					<td>Date de Naissance:</td>
					<td><input type="date" name="naissance" id="naissance" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Etat Civil:</td>
					<td><input type="text" name="etat_civil" id="etat_civil" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Nationalite:</td>
					<td><input type="text" name="nationalite" id="nationalite" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Addresse:</td>
					<td><input type="text" name="addresse" id="addresse" placeholder="ville/commune/avenue" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Addresse Mail:</td>
					<td><input type="email" name="email" id="email" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Numero de Telephone:</td>
					<td><input type="number" name="tel" id="tel" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Certificat de naissance:</td>
					<td><input type="file" name="certificat_naiss" id="certificat_naiss"></td>
				</tr>
				<tr>
					<td colspan="2">Affirmez vous que les informations ci-haut sont tous correct?</td>
				</tr>
				<tr>
					<td>Oui<input type="Radio" name="confirm" value="yes" required="required"></td><td>Non <input type="Radio" name="confirm" value="no"></td>
				</tr>
				

				<tr>
					<td colspan="2"><h3>Cette partie est pour le choix de la Faculte</h3></td>
				</tr>

				<tr>
					<td>Departement:</td>
					<td><select name="departm" id="departm" style="height: 30px; width: 400px; border-radius: 10px;" onchange="permuter(this)">
						<option>====Choisissez ici====</option>
	<?php
     $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
     $db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
     $stat="select * from departments";
     $result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

	while ($value=@mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $value[0];?>"><?php echo $value[0]." ".$value[1]; ?></option>
	<?php	
	}
	@mysqli_close($con);
	?>			
					</select></td>
				</tr>
				<tr>
					<td>Programme:</td>
					<td id="prog1"><select name="program1" id="program" style="height: 30px; width: 400px; border-radius: 10px;">
						<option>====Choisissez ici====</option>
		<?php 
				 $valeur=$_POST['program1'];
                 if ($valeur!="====Choisissez ici====") {
                 $facu=$valeur;
                           }
		?>
    <?php
     $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
     $db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
     $stat="select * from programs where putunder=1";
     $result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

	while ($value=@mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $value[0];?>"><?php echo $value[0]." ".$value[1]; ?></option>
	<?php	
	}
	@mysqli_close($con);
	?>		
						
					</select></td>
					<td id="prog2"><select name="program2" id="program" style="height: 30px; width: 400px; border-radius: 10px;">
						<option>====Choisissez ici====</option>

		<?php 
				 $valeur=$_POST['program2'];
                 if ($valeur!="====Choisissez ici====") {
                 $facu=$valeur;
                           }
		?>
    <?php
     $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
     $db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
     $stat="select * from programs where putunder=2";
     $result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

	while ($value=@mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $value[0];?>"><?php echo $value[0]." ".$value[1]; ?></option>
	<?php	
	}
	@mysqli_close($con);
	?>		
						
					</select></td>
					<td id="prog3"><select name="program3" id="program" style="height: 30px; width: 400px; border-radius: 10px;">
						<option>====Choisissez ici====</option>

		<?php 
				 $valeur=$_POST['program3'];
                 if ($valeur!="====Choisissez ici====") {
                 $facu=$valeur;
                           }
		?>
    <?php
     $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
     $db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
     $stat="select * from programs where putunder=3";
     $result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

	while ($value=@mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $value[0];?>"><?php echo $value[0]." ".$value[1]; ?></option>
	<?php	
	}
	@mysqli_close($con);
	?>		
						
					</select></td>

					<td id="prog4"><select name="program4" id="program" style="height: 30px; width: 400px; border-radius: 10px;">
						<option>====Choisissez ici====</option>

		<?php 
				 $valeur=$_POST['program4'];
                 if ($valeur!="====Choisissez ici====") {
                 $facu=$valeur;
                           }
		?>
    <?php
     $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
     $db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
     $stat="select * from programs where putunder=4";
     $result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

	while ($value=@mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $value[0];?>"><?php echo $value[0]." ".$value[1]; ?></option>
	<?php	
	}
	@mysqli_close($con);
	?>		
						
					</select></td>
					<td id="prog5"><select name="program5" id="program" style="height: 30px; width: 400px; border-radius: 10px;">
						<option>====Choisissez ici====</option>

		<?php 
				 $valeur=$_POST['program5'];
                 if ($valeur!="====Choisissez ici====") {
                 $facu=$valeur;
                           }
		?>
    <?php
     $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
     $db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
     $stat="select * from programs where putunder=5";
     $result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

	while ($value=@mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $value[0];?>"><?php echo $value[0]." ".$value[1]; ?></option>
	<?php	
	}
	@mysqli_close($con);
	?>		
						
					</select></td>
					<td id="prog6"><select name="program6" id="program" style="height: 30px; width: 400px; border-radius: 10px;">
						<option>====Choisissez ici====</option>

		<?php 
				 $valeur=$_POST['program6'];
                 if ($valeur!="====Choisissez ici====") {
                 $facu=$valeur;
                           }
		?>
    <?php
     $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
     $db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
     $stat="select * from programs where putunder=6";
     $result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

	while ($value=@mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $value[0];?>"><?php echo $value[0]." ".$value[1]; ?></option>
	<?php	
	}
	@mysqli_close($con);
	?>		
						
					</select></td>
					<td id="initial"><select name="program" id="program" style="height: 30px; width: 400px; border-radius: 10px;">
						<option>====Choisissez ici====</option>
						
					</select></td>
				</tr>
				

				<tr>
					<td colspan="2" style="color: red"><h4>Tout cas des faux entrainera le reget immediat de la candidature de l'etudiant!</h4></td>
				</tr>
				
				
				<tr>
					<td colspan="2" align="center">
						<button 
						   name="submit" 
						   style="
						      background-color: darkblue;
						      color: white;
						      border-radius: 10px;
						      width: 200px;
						      height: 50px;
						      font-size: 20px;
						      ">Soumettre
						</button>
					</td>
				</tr>

			</form>
			</tbody>
			
		</table>

	</div>

</body>
</html>

<script type="text/javascript">
	function default_p(){
		document.getElementById('prog1').style.display="none";
		document.getElementById('prog2').style.display="none";
		document.getElementById('prog3').style.display="none";
		document.getElementById('prog4').style.display="none";
		document.getElementById('prog5').style.display="none";
		document.getElementById('prog6').style.display="none";
	}

	function permuter(element){
		var change=element.value;

		if (change==1) {

			document.getElementById('prog1').style.display="block";
			document.getElementById('initial').style.display="none";
			document.getElementById('prog2').style.display="none";
			document.getElementById('prog3').style.display="none";
			document.getElementById('prog4').style.display="none";
			document.getElementById('prog5').style.display="none";
			document.getElementById('prog6').style.display="none";

		}else if (change==2) {

			document.getElementById('prog1').style.display="none";
			document.getElementById('initial').style.display="none";
			document.getElementById('prog2').style.display="block";
			document.getElementById('prog3').style.display="none";
			document.getElementById('prog4').style.display="none";
			document.getElementById('prog5').style.display="none";
			document.getElementById('prog6').style.display="none";

		}else if (change==3) {

			document.getElementById('prog1').style.display="none";
			document.getElementById('initial').style.display="none";
			document.getElementById('prog2').style.display="none";
			document.getElementById('prog3').style.display="block";
			document.getElementById('prog4').style.display="none";
			document.getElementById('prog5').style.display="none";
			document.getElementById('prog6').style.display="none";

		}else if (change==4) {
			document.getElementById('prog1').style.display="none";
			document.getElementById('initial').style.display="none";
			document.getElementById('prog2').style.display="none";
			document.getElementById('prog3').style.display="none";
			document.getElementById('prog4').style.display="block";
			document.getElementById('prog5').style.display="none";
			document.getElementById('prog6').style.display="none";

		}else if (change==5) {
			document.getElementById('prog1').style.display="none";
			document.getElementById('initial').style.display="none";
			document.getElementById('prog2').style.display="none";
			document.getElementById('prog3').style.display="none";
			document.getElementById('prog4').style.display="none";
			document.getElementById('prog5').style.display="block";
			document.getElementById('prog6').style.display="none";
			
		}else if (change==6) {
			document.getElementById('prog1').style.display="none";
			document.getElementById('initial').style.display="none";
			document.getElementById('prog2').style.display="none";
			document.getElementById('prog3').style.display="none";
			document.getElementById('prog4').style.display="none";
			document.getElementById('prog5').style.display="none";
			document.getElementById('prog6').style.display="block";
			
		}

	}

</script>


<?php
    if (isset($_POST['submit'])) {
    	$pic=basename($_FILES['passeport']['name']);
    	$fulln=$_POST['nom'];
    	$sex=$_POST['sex'];
    	$dob=$_POST['naissance'];
    	$etatCivil=$_POST['etat_civil'];
    	$nationality=$_POST['nationalite'];
    	$address=$_POST['addresse'];
    	$email=$_POST['email'];
    	$telN=$_POST['tel'];
    	$birthCert=basename($_FILES['certificat_naiss']['name']);
    	$departm=$_POST['departm'];
    	//$fac=$facu;

    $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
   	$db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
   	$stat="INSERT INTO studentdetails VALUES('$pic',0,'$fulln','$sex','$dob','$etatCivil','$nationality','$address','$email','$telN','$birthCert',$departm,$facu)";
   	$result=@mysqli_query($con,$stat) or die(@mysqli_error($con));
   	@mysqli_close($con);
    	
    }
?>

