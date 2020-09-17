<?php
$con=@mysqli_connect("localhost","root","") or die(@mysqli_error());
$db=@mysqli_select_db($con,"uob") or die(@mysqli_error($con));
$stat="select * from lecturers where faculty like '%Economie' ";
$result=@mysqli_query($con,$stat) or die(@mysqli_error($con));

$value=@mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>ViewEconomy</title>
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
	<h1 align="center" style="color: red;">Liste des enseignants de l'UOB</h1>
	<form method="GET" action="ViewLecturers.php" style=" 
	                           margin-left: 900px;
	                           margin-top: -65px;
	                           margin-bottom: 50px;
	                           position: relative;

	                           ">
	<button name="fullview" style="background-color: green; 
	                               color: white;
	                               height: 50px;
	                               width: 50px;
	                               border-radius: 50px;"
	                               title="Retour">
            <h3><a href="ViewLecturers"><b><-</b></a></h3>	</button>
	</form>
	<table cellpadding="1" cellspacing="10" border="0" style="width: 96%; height: 15%;">
		<thead></thead><tbody>
		<tr>
			<td style="background-color: darkgray;
			           color: white;
			           border-radius: 10px;
			"><a href="ViewSciences.php">Du Departement des Sciences</a></td>

				<td style="background-color: yellow;
			           color: white;
			           border-radius: 10px;
			"><a href="ViewEconomy.php">Du Departement d'Economie</a></td>
			
				<td style="background-color: darkgray;
			           color: white;
			           border-radius: 10px;
			"><a href="ViewDroit.php">Du Departement de Droit</a></td>
		</tr>
		
	</tbody>
    </table>

	<form method="GET" action="ViewLecturers.php">
	<table border="0" cellpadding="1" cellspacing="5" style="background-color: white; border-radius: 10px;">
		<thead>
			<th>Photo</th>
			<th>Nom complet</th>
			<th>Sexe</th>
			<th>Addresse Mail</th>
			<th>Telephone</th>
			<th>Departement</th>
		</thead>
		<tbody>
			<?php
			while ($value=@mysqli_fetch_array($result)) {
				?>
				<tr>
					<td><img style="height: 30px; width: 30px; border-radius: 30px; border-style: solid;" src="data:image/jpg; base64,<?php echo base64_encode($value["passport"]) ?>"></td>
					<td><?php echo $value["fullname"]?></td>
					<td><?php echo $value["sex"]?></td>
					<td><?php echo $value["emailAddress"]?></td>
					<td><?php echo $value["telNum"]?></td>
					<td><?php echo $value["faculty"]?></td>
					

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