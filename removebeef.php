<?php
 session_start();
if (isset($_SESSION['user']))
{
  if (isset($_POST['submit'])) {
$qt1 = $_POST['qt'];
$conn=oci_connect("SYSTEM","robert","localhost/XE");
$strSQL = 'Update foodqt set TOTALQUANTITY= :qw where productid=3 and orderid= :pda';
//*** Define Variable $objParse and $objExecute ***//
$objParse = oci_parse($conn, $strSQL);
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
oci_bind_by_name($objParse, ':qw', $qt1);
oci_bind_by_name($objParse, ':pda', $oida);
$objExecute = oci_execute($objParse);
if($objExecute)
{
    oci_commit($conn); //*** Commit Transaction ***//
    //oci_free_statement($objExecute);
    echo "Save completed.";
    echo "ADDED beef TO CART";
  //header("Location: restaurant.html");
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

header("Location: trylist.php");


oci_close($conn);
}
else
{
  echo "Submit issue";
}
}

else
{
  echo "Session issue";
  header("Location: Login1.html");
}
?>