<!DOCTYPE html>
<html>
<head>
	<title>RegisterDepartment</title>
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
		<h2 align="center">Fiche de creation et enregistrement d'un departement</h2>
		<h3 align="center">Ces informations sont a verifier avant d'etre entrer</h3>
	  
        <div align="left" style="border-style: solid; border-radius: 5px; margin: 10px; padding: 10px;" ><p><b>L'inscription d'un Departement d'etude est faite en suivant le Reglement d'Ordre Interieur de l'Universie et doiot au prealable etre decide dans un Conseil d'Administration de l'Universite. Cette page n'est accessible que par le recteur de l'Universite. ainsi il est le seul habilite a creer un Departement dans l'Universite. la creation doit aussi etre precedee par une validation du ministere de l'Enseignement Universitaire</b></p></div>
        </br></br>
        <h3>Veillez progressivement completez la fiche</h3>
		<table cellpadding="5" cellspacing="5" align="center">
			<thead></thead>
			<tbody>
			<form method="POST" action="RegisterDepartment.php" enctype="multipart/form-data"/>
				<tr>
					<td>Nom du Departement:</td>
					<td><input type="text" name="nom" id="nom" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Description:</td>
					<td><input type="text" name="description" id="description" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Cycle Supportes:</td>
					<td><select name="cycle" id="cycle" style="height: 30px; width: 400px; border-radius: 10px;">
						<option value="Cycle de Licence">Cycle de Licence</option>
						<option value="Cycle de Licence et de Master">Cycle de Licence et de Master</option>
						<option value="Cycle de Licence, de Master et de Doctorat">Cycle de Licence, de Master et de Doctorat</option>
					</select></td>
				</tr>
				
				<tr>
					<td colspan="2">Etes-vous sur de la veracite de ces informations?</td>
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
    	$depart_name=$_POST['nom'];
    	$descript=$_POST['description'];
    	$cyclesupp=$_POST['cycle'];

    $con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
   	$db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
   	$stat="INSERT INTO departments VALUES(0,'$depart_name','$descript','$cyclesupp')";
   	$result=@mysqli_query($con,$stat) or die(@mysqli_error($con));
   	@mysqli_close($con);
    	
    }

?>
