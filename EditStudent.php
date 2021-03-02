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
<body onload="initial();">

	<div class="scroll" align="center">
		<h1 align="center" style="color: red;">Universite Officielle de Bukavu</h1>
		<h2 align="center">Fiche d'inscription pour etudiant</h2>
		<h3 align="center">Veuillez completer les cases ci apres:</h3>
	  </br></br>
        <h4 align="center">Cette fiche ne doit etre complete qu'une fois que le candidat aura depose tout les documents demande </h4>

		<table cellpadding="5" cellspacing="5" align="center">
			<thead></thead>
			<tbody>
			<form method="POST" action="UpdateStudent.php" enctype="multipart/form-data">
				<tr>
					<td>Photo Passeport:</td>
					<td><input type="file" name="passeport" id="passeport" value="<?php echo $value[0]?>"></td>
				</tr>
				<tr>
					<td>Numero d'Enregistrement:</td>
					<td><input type="number" name="numeroEnreg" id="numeroEnreg" value="<?php echo $value[1]?>" hidden><?php echo $StudentID; ?></td>
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

					   $scienc=1;
					   $econo=3;
					   $droi=4;

		 if ($value[11]==$scienc) {
				?>
				<tr>
			    <td>Departement:</td>
				<td><select name="department" id="department" style="height: 30px; width: 400px; border-radius: 10px;" onchange="permuter(this)">

					 <option value="Departement des Sciences" selected="selected">Departement des Sciences </option>
					 <option value="Departement d'economie">Departement d'economie</option>
					 <option value="Departement de Droit">Departement de Droit</option>
				     </select>
			    </td>
		        </tr>
		    <?php

		      $con1=@mysqli_connect("localhost","root","") or die(@mysqli_error());

              $db=@mysqli_select_db($con1,"uob") or die(@mysqli_error($con1));

              $stat="select * from programs where putunder='$scienc'";

              $result=@mysqli_query($con1,$stat) or die(@mysqli_error($con1));
         

              $value1=@mysqli_fetch_array($result);


              @mysqli_close($con1); 


		  }elseif ($value[11]==$econo) {
            ?>
                <tr>
			    <td>Departement:</td>
				<td><select name="department" id="department" style="height: 30px; width: 400px; border-radius: 10px;" onchange="permuter(this)">

					 <option value="Departement des Sciences">Departement des Sciences </option>
					 <option value="Departement d'economie" selected="selected">Departement d'economie</option>
					 <option value="Departement de Droit">Departement de Droit</option>
				     </select>
			    </td>
		        </tr>
		    <?php
		  	
		  	$con2=@mysqli_connect("localhost","root","") or die(@mysqli_error());

              $db=@mysqli_select_db($con2,"uob") or die(@mysqli_error($con2));

              $stat="select * from programs where putunder='$econo'";

              $result=@mysqli_query($con2,$stat) or die(@mysqli_error($con2));
         

              $value2=@mysqli_fetch_array($result); 


              @mysqli_close($con2);


		  }elseif ($value[11]==$droi) {
		  	?>
                <tr>
			    <td>Departement:</td>
				<td><select name="department" id="department" style="height: 30px; width: 400px; border-radius: 10px;" onchange="permuter(this)">

					 <option value="Departement des Sciences">Departement des Sciences </option>
					 <option value="Departement d'economie">Departement d'economie</option>
					 <option value="Departement de Droit" selected="selected">Departement de Droit</option>
				     </select>
			    </td>
		        </tr>
		    <?php
		  	
		  	$con3=@mysqli_connect("localhost","root","") or die(@mysqli_error());

            $db=@mysqli_select_db($con3,"uob") or die(@mysqli_error($con3));

            $stat="select * from programs where putunder='$droi'";

            $result=@mysqli_query($con3,$stat) or die(@mysqli_error($con3));
         

            $value3=@mysqli_fetch_array($result); 


            @mysqli_close($con3);
		  }
		  

					     //$eco=1;
					     //$relintel=2;
					     //$agro=3;
					     //$geol=4;
					     //$civileng=5;
					     //$entreadmin=6;

        		             
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

	function initial(){

	}
	
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



