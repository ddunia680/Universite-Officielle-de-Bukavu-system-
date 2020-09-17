<!DOCTYPE html>
<html>
<head>
	<title>RegisterLecturer</title>
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
		<h2 align="center">Fiche d'enregistrement d'enseignant</h2>
		<h3 align="center">Ces informations sont a verifier avant d'etre entrer</h3>
	  </br></br>
        <h4 align="center">Cette fiche ne doit etre complete qu'une fois que le candidat aura depose tout les documents requis </h4>

		<table cellpadding="5" cellspacing="5" align="center">
			<thead></thead>
			<tbody>
			<form method="POST" action="RegisterLecturer.php" enctype="multipart/form-data"/>
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
					<td>Degree:</td>
					<td><input type="text" name="degree" id="degree" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td colspan="2">Affirmez vous que les informations ci-haut sont tous correct?</td>
				</tr>
				<tr>
					<td>Oui<input type="Radio" name="confirm" value="yes" required="required"></td><td>Non <input type="Radio" name="confirm" value="no"></td>
				</tr>
				<tr>
					<td>Enregistrer sous:</td>
					<td><select name="departm" required="required" style="height: 30px; width: 400px; border-radius: 10px;">
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
					</select>
				    </td>
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
    	$pic=basename($_FILES['passeport']['name']);
    	$fulln=$_POST['nom'];
    	$sex=$_POST['sex'];
    	$etatCivil=$_POST['etat_civil'];
    	$nationality=$_POST['nationalite'];
    	$address=$_POST['addresse'];
    	$email=$_POST['email'];
    	$telN=$_POST['tel'];
    	$degreeD=$_POST['degree'];
    	$depart=$_POST['departm'];

    $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
   	$db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
   	$stat="INSERT INTO lecturers VALUES(0,'$fulln','$email','$degreeD','$telN','$nationality','$sex','$address','$etatCivil','$pic',$depart)";
   	$result=@mysqli_query($con,$stat) or die(@mysqli_error($con));
   	@mysqli_close($con);
    	
    }

?>


