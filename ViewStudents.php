<?php
$con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
$db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
$stat="select * from studentdetails";
$result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

$value=@mysqli_fetch_array($result);

?>



<!DOCTYPE html>
<html>
<head>
	<title>ViewStudents</title>
	<style type="text/css">
		body {
			background-image: url("cover.jpg");
		}
		th {
			background-color: darkblue;
			color: white;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div style="
           background-color: lightblue;
           border-radius: 10px;
           width: 90%;
		   height: 500px;
           text-align: center;
		   overflow-x: hidden;
		   overflow-y: auto;
		   padding: 20px;
		   border-radius: 10px;
		   border-style: solid;
		   margin-left: 3%;
		   position: relative;
			overflow-x: hidden;
			overflow-y: auto;

	">
	<h1 align="center" style="color: red;">Liste des Etudiants Enregistre a l'UOB</h1>
	<form method="GET" action="fullDetails.php" style=" 
	                           margin-left: 900px;
	                           margin-top: -65px;
	                           margin-bottom: 50px;
	                           position: relative;

	                           ">
	<button name="fullview" style="background-color: green; 
	                               color: white;
	                               height: 50px;
	                               width: 200px;
	                               border-radius: 10px;">
	    <h3>Voir les details complet</h3>
	</button>
	</form>

	<form method="GET" action="ViewStudents.php">
	<table border="0" cellpadding="1" cellspacing="5" style="background-color: white; border-radius: 10px;">
		<thead>
			<th>Photo</th>
			<th>Numero d'enregistrement</th>
			<th>Nom complet</th>
			<th>Sexe</th>
			<th>Nationalite</th>
			<th>Addresse Mail</th>
			<th>Telephone</th>
			<th>Departement</th>
			<th>Faculte</th>
		</thead>
		<tbody>
			<?php
			while ($value=@mysqli_fetch_array($result)) {
				?>
				<tr>
					<td><img style="height: 30px; width: 30px; border-radius: 30px; border-style: solid;" src="data:image/jpg; base64,<?php echo base64_encode($value["passport"]) ?>"></td>
					<td><?php echo $value["RegNo"]?></td>
					<td><?php echo $value["fullname"]?></td>
					<td><?php echo $value["sex"]?></td>
					<td><?php echo $value["nationality"]?></td>
					<td><?php echo $value["email"]?></td>
					<td><?php echo $value["tel"]?></td>
					<td><?php echo $value["department"]?></td>
					<td><?php echo $value["program"]?></td>
					<td><form method="GET" action="EditStudent.php"><button name="update" style="
					                              border-radius: 10px; 
					                              background-color: yellow; 
					                              color: darkblue; 
					                              height: 40px;">
					            <?php echo "<a href='EditStudent.php?id=$value[1]'>Mettre a jour</a>" ?>
					            	
					          </button>
					    </form>
					</td>

				</tr>
				<tr>
					<td colspan="10"><?php echo "____________________________________________________________________________________________________________________________________"; ?></td>
				</tr>
				
			<?php
			@mysqli_close($con);	
			}
			?>
			
		</tbody>
	</table>
    </form>
		
	</div>


</body>
</html>