<!DOCTYPE html>
<html>
<head>
	<title>RegisterProgram</title>
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
<body>

	<div class="scroll" align="center">
		<h1 align="center" style="color: red;">Universite Officielle de Bukavu</h1>
		<h2 align="center">Fiche de Creation d'un Departement</h2>
		
	  
        <div align="left" style="border-style: solid; border-radius: 5px; margin: 10px; padding: 10px;" ><p><b>L'inscription d'un programme dans un departement doit etre decide dans un Conseil d'Administration Academique et en suivant le Reglement d'Ordre Interieur de l'Universite. Tout les prealables doivent etre prise en compte avant la prise de cette decision, prealables en terme de professeurs, locaux etc. Une fois decide, seul le recteur a le droit de proceder a cette creation. Ainsi cette page n'est donc accessible que par ce dernier.</b></p></div>
        </br></br>
        <h3 align="center">Veillez completer progressivement cette fiche:</h3>
		<table cellpadding="5" cellspacing="5" align="center">
			<thead></thead>
			<tbody>
			<form method="POST" action="RegisterProgram.php" enctype="multipart/form-data"/>
				<tr>
					<td>Nom du Programme:</td>
					<td><input type="text" name="nom" id="nom" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Description:</td>
					<td><input type="text" name="description" id="description" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Duree d'etude:</td>
					<td><input type="text" name="duree" id="duree" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Prealables d'inscription:</td>
					<td><input type="text" name="prealable" id="prealable" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Enregistrer sous:</td>
					<td><select name="sous" id="sous" style="height: 30px; width: 400px; border-radius: 10px;">
						<option>Choisissez ici</option>
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

</body>
</html>


<?php
    if (isset($_POST['submit'])) {
    	$program_name=$_POST['nom'];
    	$descript=$_POST['description'];
    	$length=$_POST['duree'];
    	$condit=$_POST['prealable'];
    	$putUnder=$_POST['sous'];

    $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
   	$db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
   	$stat="INSERT INTO programs VALUES(0,'$program_name','$descript','$length','$condit','$putUnder')";
   	$result=@mysqli_query($con,$stat) or die(@mysqli_error($con));
   	@mysqli_close($con);
    	
    }

?>
