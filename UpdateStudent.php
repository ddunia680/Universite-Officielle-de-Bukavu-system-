<?php

$StudentID=$_GET['id'];

$con=@mysqli_connect("localhost","root","") or die(@mysqli_error());

$db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));

$stat="select * from studentdetails where RegNo='$StudentID'";

$result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

$value=@mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html>
<head>
	<title>UpdateStudent</title>
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
<body>

	<div class="scroll" align="center">
		<h1 align="center" style="color: red;">Universite Officielle de Bukavu</h1>
		<h2 align="center">Fiche d'inscription pour etudiant</h2>
		<h3 align="center">Veuillez completer les cases ci apres:</h3>
	  </br></br>
        <h4 align="center">Cette fiche ne doit etre complete qu'une fois que le candidat aura depose tout les documents demande </h4>

		<table cellpadding="5" cellspacing="5" align="center">
			<thead></thead>
			<tbody>
			<form method="POST" action="UpdateStudent.php" enctype="multipart/form-data"/>
				<tr>
					<td>Photo Passeport:</td>
					<td><input type="file" name="passeport" id="passeport" value="<?php echo $value[0]?>"></td>
				</tr>
				<tr>
					<td>Numero d'Enregistrement:</td>
					<td><input type="text" name="numeroEnreg" id="numeroEnreg" value="<?php echo $value[1]?>" disabled="true"></td>
				</tr>
				<tr>
					<td>Nom complet:</td>
					<td><input type="text" name="nom" id="nom" value="<?php echo $value[2]?>" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Sexe:</td>
					<?php
					     $masc="Masculin";
					    if ($value[3]==$masc) {
					      ?>
					 <td>Masculin<input type="Radio" name="sex" id="sex" value="Masculin" checked="checked">    Feminin<input type="Radio" name="sex" id="sex" value="Feminin"></td>
					<?php
					}else {
						?>
					<td>Masculin<input type="Radio" name="sex" id="sex" value="Masculin">     Feminin<input type="Radio" name="sex" id="sex" value="Feminin" checked="checked"></td>
					<?php
					    }
					?>
					
				</tr>
				<tr>
					<td>Date de Naissance:</td>
					<td><input type="date" name="naissance" id="naissance" value="<?php echo $value[4]?>" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Etat Civil:</td>
					<td><input type="text" name="etat_civil" id="etat_civil" value="<?php echo $value[5]?>" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Nationalite:</td>
					<td><input type="text" name="nationalite" id="nationalite" value="<?php echo $value[6]?>" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Addresse:</td>
					<td><input type="text" name="addresse" id="addresse" value="<?php echo $value[7]?>" placeholder="ville/commune/avenue" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Addresse Mail:</td>
					<td><input type="email" name="email" id="email" value="<?php echo $value[8]?>" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Numero de Telephone:</td>
					<td><input type="number" name="tel" id="tel" value="<?php echo $value[9]?>" style="height: 30px; width: 400px; border-radius: 10px;"></td>
				</tr>
				<tr>
					<td>Certificat de naissance:</td>
					<td><input type="file" name="certificat_naiss" id="certificat_naiss" value="<?php echo $value[10]?>"></td>
				</tr>
			
				<tr>
					<td colspan="2"><h3>Cette partie est pour le choix de la Faculte</h3></td>
				</tr>
				
				<?php
					   $scienc="Departement des Sciences";
					   $droi="Departement de Droit";
					   $econo="Departement d'economie";

		 if ($value[11]==$scienc) {
				?>
				<tr>
			    <td>Departement:</td>
				<td><select name="department" id="department" style="height: 30px; width: 400px; border-radius: 10px;" onchange="permuter(this)">

					 <option value="Departement des Sciences" selected="selected">Departement des Sciences </option>
				     <option value="Departement de Droit">Departement de Droit</option>
					 <option value="Departement d'economie">Departement d'economie</option>
				     </select>
			    </td>
		        </tr>

					 <?php
					     $agro="Faculte des Sciences Agronomiques";
						$civo="Faculte de Science en Genie Civile";
						$geo="Faculte de Science en Geologie";
						$info="Faculte de Science en Informatique";
						$petrol="Faculte de Science en Genie Petrole";
						$electric="Faculte de Science en Electricite";

					           if ($value[12]==$agro) {
					         ?>

					             <tr>
					             <td>Faculte</td>
					             <td id="faculte1"><select name="faculte1"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte des Sciences Agronomiques" selected="selected">Faculte des Sciences Agronomiques</option>
						              <option value="Faculte de Science en Genie Civile">Faculte de Science en Genie Civile</option>
						              <option value="Faculte de Science en Geologie">Faculte de Science en Geologie</option>
						              <option value="Faculte de Science en Informatique">Faculte de Science en Informatique</option>
						              <option value="Faculte de Science en Genie Petrole">Faculte de Science en Genie Petrole</option>
						              <option value="Faculte de Science en Electricite">Faculte de Science en Electricite</option>
						
					                  </select>
				                 </td>
				                 </tr>
				             <?php
				               }elseif ($value[12]==$civo) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte1"><select name="faculte1"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte des Sciences Agronomiques">Faculte des Sciences Agronomiques</option>
						              <option value="Faculte de Science en Genie Civile" selected="selected">Faculte de Science en Genie Civile</option>
						              <option value="Faculte de Science en Geologie">Faculte de Science en Geologie</option>
						              <option value="Faculte de Science en Informatique">Faculte de Science en Informatique</option>
						              <option value="Faculte de Science en Genie Petrole">Faculte de Science en Genie Petrole</option>
						              <option value="Faculte de Science en Electricite">Faculte de Science en Electricite</option>
						
					                  </select>
				                 </td>
				                 </tr>

				             <?php
				               }elseif ($value[12]==$geo) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte1"><select name="faculte1"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte des Sciences Agronomiques">Faculte des Sciences Agronomiques</option>
						              <option value="Faculte de Science en Genie Civile">Faculte de Science en Genie Civile</option>
						              <option value="Faculte de Science en Geologie" selected="selected">Faculte de Science en Geologie</option>
						              <option value="Faculte de Science en Informatique">Faculte de Science en Informatique</option>
						              <option value="Faculte de Science en Genie Petrole">Faculte de Science en Genie Petrole</option>
						              <option value="Faculte de Science en Electricite">Faculte de Science en Electricite</option>
						
					                  </select>
				                 </td>
				                 </tr>
				             <?php
				               }elseif ($value[12]==$info) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte1"><select name="faculte1"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte des Sciences Agronomiques">Faculte des Sciences Agronomiques</option>
						              <option value="Faculte de Science en Genie Civile">Faculte de Science en Genie Civile</option>
						              <option value="Faculte de Science en Geologie">Faculte de Science en Geologie</option>
						              <option value="Faculte de Science en Informatique" selected="selected">Faculte de Science en Informatique</option>
						              <option value="Faculte de Science en Genie Petrole">Faculte de Science en Genie Petrole</option>
						              <option value="Faculte de Science en Electricite">Faculte de Science en Electricite</option>
						
					                  </select>
				                 </td>
				                 </tr>
				             <?php
				               }elseif ($value[12]==$petrol) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte1"><select name="faculte1"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte des Sciences Agronomiques">Faculte des Sciences Agronomiques</option>
						              <option value="Faculte de Science en Genie Civile">Faculte de Science en Genie Civile</option>
						              <option value="Faculte de Science en Geologie">Faculte de Science en Geologie</option>
						              <option value="Faculte de Science en Informatique">Faculte de Science en Informatique</option>
						              <option value="Faculte de Science en Genie Petrole" selected="selected">Faculte de Science en Genie Petrole</option>
						              <option value="Faculte de Science en Electricite">Faculte de Science en Electricite</option>
						
					                  </select>
				                 </td>
				                 </tr>
				             <?php
				               }elseif ($value[12]==$electric) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte1"><select name="faculte1"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte des Sciences Agronomiques">Faculte des Sciences Agronomiques</option>
						              <option value="Faculte de Science en Genie Civile">Faculte de Science en Genie Civile</option>
						              <option value="Faculte de Science en Geologie">Faculte de Science en Geologie</option>
						              <option value="Faculte de Science en Informatique">Faculte de Science en Informatique</option>
						              <option value="Faculte de Science en Genie Petrole">Faculte de Science en Genie Petrole</option>
						              <option value="Faculte de Science en Electricite" selected="selected">Faculte de Science en Electricite</option>
						
					                 </select>
				                 </td>
				                 </tr>
				             <?php
				               }else{
				             ?>
				               	<p>Pas de faculte</p>
				               
				               <?php
				               }
				    	
		 }elseif ($value[11]==$droi) {
				?>
				<tr>
			    <td>Departement:</td>
				<td><select name="department" id="department" style="height: 30px; width: 400px; border-radius: 10px;" onchange="permuter(this)">
					 <option value="Departement des Sciences">Departement des Sciences </option>
				     <option value="Departement de Droit" selected="selected">Departement de Droit</option>
					 <option value="Departement d'economie">Departement d'economie</option>
					</select>
				</td>
			    </tr>

					 <?php
					     $inter="Faculte de Droit Internationale";
						$relat="Faculte de Relation Internationale";
						$journ="Faculte de Journalisme";
						
					           if ($value[12]==$inter) {
					         ?>

					             <tr>
					             <td>Faculte</td>
					             <td id="faculte2"><select name="faculte2"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte de Droit Internationale" selected="selected">Faculte de Droit Internationale</option>
						              <option value="Faculte de Relation Internationale">Faculte de Relation Internationale</option>
						              <option value="Faculte de Journalisme">Faculte de Journalisme</option>
						
					                  </select>
				                 </td>
				                 </tr>
				             <?php
				               }elseif ($value[12]==$relat) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte2"><select name="faculte2"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte de Droit Internationale">Faculte de Droit Internationale</option>
						              <option value="Faculte de Relation Internationale" selected="selected">Faculte de Relation Internationale</option>
						              <option value="Faculte de Journalisme">Faculte de Journalisme</option>
					                  </select>
				                 </td>
				                 </tr>

				             <?php
				               }elseif ($value[12]==$journ) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte2"><select name="faculte2"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte de Droit Internationale">Faculte de Droit Internationale</option>
						              <option value="Faculte de Relation Internationale">Faculte de Relation Internationale</option>
						              <option value="Faculte de Journalisme" selected="selected">Faculte de Journalisme</option>
					                  </select>
				                 </td>
				                 </tr>
				                 <?php
				               }else{
				             ?>
				               	<p>Pas de faculte</p>
				                            
				<?php
				}
	     }elseif ($value[11]==$econo) {
				?>
				<tr>
			    <td>Departement:</td>
				<td><select name="department" id="department" style="height: 30px; width: 400px; border-radius: 10px;"  onchange="permuter(this)">
					 <option value="Departement des Sciences">Departement des Sciences </option>
				     <option value="Departement de Droit">Departement de Droit</option>
					 <option value="Departement d'economie" selected="selected">Departement d'economie</option>
					</select>
				</td>
			    </tr>

			    <?php
					     $banq="Faculte de Science en Banque et Finance";
						$gest="Faculte de Science en Gestion des Entreprises";
						$proc="Faculte de Science en Procurement";
						$eco="Faculte de Science en Economie Generale";
						
					           if ($value[12]==$banq) {
					         ?>

					             <tr>
					             <td>Faculte</td>
					             <td id="faculte3"><select name="faculte3"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte de Science en Banque et Finance" selected="selected">Faculte de Science en Banque et Finance</option>
						              <option value="Faculte de Science en Gestion des Entreprises">Faculte de Science en Gestion des Entreprises</option>
						              <option value="Faculte de Science en Procurement">Faculte de Science en Procurement</option>
						              <option value="Faculte de Science en Economie Generale">Faculte de Science en Economie Generale</option>
						
					                  </select>
				                 </td>
				                 </tr>
				             <?php
				               }elseif ($value[12]==$gest) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte3"><select name="faculte3"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte de Science en Banque et Finance">Faculte de Science en Banque et Finance</option>
						              <option value="Faculte de Science en Gestion des Entreprises" selected="selected">Faculte de Science en Gestion des Entreprises</option>
						              <option value="Faculte de Science en Procurement">Faculte de Science en Procurement</option>
						              <option value="Faculte de Science en Economie Generale">Faculte de Science en Economie Generale</option>
					                  </select>
				                 </td>
				                 </tr>

				             <?php
				               }elseif ($value[12]==$proc) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte3"><select name="faculte3"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte de Science en Banque et Finance">Faculte de Science en Banque et Finance</option>
						              <option value="Faculte de Science en Gestion des Entreprises">Faculte de Science en Gestion des Entreprises</option>
						              <option value="Faculte de Science en Procurement" selected="selected">Faculte de Science en Procurement</option>
						              <option value="Faculte de Science en Economie Generale">Faculte de Science en Economie Generale</option>
					                  </select>
				                 </td>
				                 </tr>
				                 <?php
				               }elseif ($value[12]==$eco) {
				             ?>
				                 <tr>
				                 <td>Faculte</td>
					             <td id="faculte3"><select name="faculte3"  style="height: 30px; width: 400px; border-radius: 10px;">
						
						              <option>====Choisissez ici====</option>
						              <option value="Faculte de Science en Banque et Finance">Faculte de Science en Banque et Finance</option>
						              <option value="Faculte de Science en Gestion des Entreprises">Faculte de Science en Gestion des Entreprises</option>
						              <option value="Faculte de Science en Procurement">Faculte de Science en Procurement</option>
						              <option value="Faculte de Science en Economie Generale" selected="selected">Faculte de Science en Economie Generale</option>
					                  </select>
				                 </td>
				                 </tr>
				                 <?php
				               }else{
				             ?>
				               	<p>Pas de faculte</p>
				             <?php 
				               }
		 }
				             
				@mysqli_close($con);
				?>

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
						      ">Enregistrer
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
	
	function permuter(element){
		var change=element.value;

		if (change=="Departement des Sciences") {

			document.getElementById('faculte1').style.display="block";
			document.getElementById('faculte2').style.display="none";
			document.getElementById('faculte3').style.display="none";

		}else if (change=="Departement de Droit") {

			document.getElementById('faculte1').style.display="none";
			document.getElementById('faculte2').style.display="block";
			document.getElementById('faculte3').style.display="none";

		}else if (change=="Departement d'economie") {

			document.getElementById('faculte1').style.display="none";
			document.getElementById('faculte2').style.display="none";
			document.getElementById('faculte3').style.display="block";
		}

	}

</script>


<?php
if (isset($_POST['submit'])) {
	$passp=$_POST['passeport'];
	$regn=$_POST['numeroEnreg'];
	$nam=$_POST['nom'];
	$sexx=$_POST['sex'];
	$dob=$_POST['naissance'];
	$etatCiv=$_POST['etat_civil'];
	$nation=$_POST['nationalite'];
	$addr=$_POST['addresse'];
	$mails=$_POST['email'];
	$teleph=$_POST['tel'];
	$birthCert=$_POST['certificat_naiss'];
	$depart=$_POST['department'];
	$fac=$_POST['faculte'];

  $conn=@mysqli_connect("localhost","root","") or die(mysqli_error());

  $dbs=@mysqli_select_db($conn,"uob") or die(mysqli_error($conn));

  $statm="update studentdetails set passport='$passp', fullname='$nam', sex='$sexx', DOB='$dob', CivilState='$etatCiv', nationality='$nation', address='$addr', email='$mails', tel='$teleph', birthCertificate='$birthCert', department='$depart', faculty='$fac' where RegNo=$regn";

  $results=@mysqli_query($conn, $statm) or die(mysqli_error($conn));

  @mysqli_close($conn);

}
?>

