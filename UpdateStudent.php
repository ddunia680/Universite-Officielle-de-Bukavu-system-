<?php
if (isset($_POST['submit'])) {
	$passp=basename($_FILES['passeport']['name']);
	$regn=$_POST['numeroEnreg'];
	$nam=$_POST['nom'];
	$sexx=$_POST['sex'];
	$dob=$_POST['naissance'];
	$etatCiv=$_POST['etat_civil'];
	$nation=$_POST['nationalite'];
	$addr=$_POST['addresse'];
	$mails=$_POST['email'];
	$teleph=$_POST['tel'];
	$birthCert=basename($_FILES['certificat_naiss']['name']);
	$depart=$_POST['department'];
	$fac=$_POST['faculte'];

  $conn=@mysqli_connect("localhost","root","") or die(mysqli_error());

  $dbs=@mysqli_select_db($conn,"uob") or die(mysqli_error($conn));

  $statm="UPDATE studentdetails set passport='$passp', fullname='$nam', sex='$sexx', DOB='$dob', CivilState='$etatCiv', nationality='$nation', address='$addr', email='$mails', tel='$teleph', birthCertificate='$birthCert', department='$depart', faculty='$fac' where RegNo=$regn";

  $results=@mysqli_query($conn, $statm) or die(mysqli_error($conn));

  @mysqli_close($conn);

}
?>
