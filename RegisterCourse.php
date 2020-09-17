
<!DOCTYPE html>
<html>
<head>
	<title>RegisterCourse</title>
	<style type="text/css">
		body{
			background-image: url("cover.jpg");
		}
		div.scroll {
			background-color: lightgray;
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
		<h2 align="center">Fiche d'inscription des cours</h2>
		<div align="left" style="border-style: solid; border-radius: 5px; margin: 10px; padding: 10px;" ><p><b>L'inscription d'un cours a un programme d'un Departement doit suivre la regulation nationale mais aussi doit etre fait dans la conformite avec le reglement d'ordre interieur de l'Universite. L'inscription d'un cours doit dabord etre decide dans un conseil d'administration. Cette page n'est accessible que par le gestionnaire academique et le recteur et est interdit d'acces a toute autre personne.</b></p></div>
	  </br></br>
        <h4 align="center">Entrez des details du cours progressivement </h4>

		<table cellpadding="5" cellspacing="5" align="center">
			<thead></thead>
			<tbody>
			<form method="POST" action="RegisterCourse.php" enctype="multipart/form-data"/>
				
				<tr>
					<td>Nom du Cours:</td>
					<td><input type="text" name="nom" id="nom" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Description:</td>
					<td><input type="text" name="description" id="description" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Annee d'etude:</td>
					<td><input type="text" name="annee" id="annee" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Nombre d'heures:</td>
					<td><input type="text" name="heures" id="heures" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				
				<tr>
					<td colspan="2" style="text-align: center;"><b>Cette Section est pour le choix du Departement et du Programme</b></td>
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

	$depar=$_POST['departm'];
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
					<td>Professeur</td>
					<td><select name="professeur" id="program" style="height: 30px; width: 400px; border-radius: 10px;">
						<option>====Choisissez ici====</option>
<!here i failed to specpfy the lecturers to be seen to be from only one specific department, this should be revisited
<?php
     $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
     $db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
     $stat="select * from lecturers";
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
					<td colspan="2">Affirmez vous que les informations ci-haut sont tous correct?</td>
				</tr>
				<tr>
					<td>Oui<input type="Radio" name="confirm" value="yes" required="required"></td><td>Non <input type="Radio" name="confirm" value="no"></td>
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
	<!<p><?php echo $depar; ?></p>

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
    	$name=$_POST['nom'];
    	$descript=$_POST['description'];
    	$year=$_POST['annee'];
    	$nbr_of_hours=$_POST['heures'];
    	$depart=$_POST['departm'];
    	//$fac=$facu;

    $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
   	$db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
   	$stat="INSERT INTO courses VALUES(0,'$name','$descript','$year','$nbr_of_hours',$depart,$facu)";
   	$result=@mysqli_query($con,$stat) or die(@mysqli_error($con));
   	@mysqli_close($con);
    	
    }


?>