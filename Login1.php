<?php
session_start();
if (isset($_POST['submit'])) {
	//echo "<script type='text/javascript'> alert('pp') </script>";
    $use = $_POST['use'];
    $pas = $_POST['Pas'];

	error_reporting(E_ERROR | E_PARSE );

$conn=oci_connect("SYSTEM","robert","localhost/XE");
If (!$conn)
        echo 'Failed to connect to Oracle';
    else
        echo 'Succesfully connected with Oracle DB';
//echo "<script type='text/javascript'> alert('ll') </script>";
$sqlstm= "select CUSTOMERNAME from CUSTOMERS where CUSTOMERNAME = '".$_POST["use"]."'";
	$res1 = oci_parse($conn,$sqlstm);   // parse the query through connection
	oci_define_by_name($res1, 'CUSTOMERNAME', $unos);
	oci_execute($res1);
	oci_fetch($res1);
if($unos==$use){
oci_free_statement($res1);
$sqlstm= "select PHONE from CUSTOMERS where PHONE = '".$_POST["Pas"]."'";
	$res1 = oci_parse($conn,$sqlstm);   // parse the query through connection
	oci_define_by_name($res1, 'PHONE', $pswd);
	oci_execute($res1);
	oci_fetch($res1);
if($pswd==$pas){
	oci_free_statement($res1);
	$sqlstm= "select CUSTOMERID from CUSTOMERS where PHONE = '".$_POST["Pas"]."' AND CUSTOMERNAME = '".$_POST["use"]."'";
	$res1 = oci_parse($conn,$sqlstm);
    oci_define_by_name($res1, 'CUSTOMERPID', $ids);
	oci_execute($res1);
	while(oci_fetch($res1))
	{
		for($x=1;$x<=ocinumcols($res1); $x++) 
		 $y=ociresult($res1,$x);
	echo $y;
	$_SESSION['user']=$y; }
     print "SUCCESFULLY";
 header("Location: restaurant.html");
        exit;
}
}
echo "<script type='text/javascript'> alert('TRY AGAIN') </script>";
}
else
{
	echo "FAILED AGAIN";
}

?>