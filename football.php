<?php
session_start();
if (isset($_SESSION['user']))
{
	if (isset($_POST['submit'])) {
$conn=oci_connect("SYSTEM","robert","localhost/XE");
    If (!$conn)
        echo 'Failed to connect to Oracle';
    else
        echo 'Succesfully connected with Oracle DB';
 
 $qt = $_POST['qt'];

$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$strSQL = 'INSERT INTO ORDERITEM(ORDERID,PRODUCTID,UNITPRICE,QUANTITY,ORDERNUM) '.
          'VALUES(:nums,10,13.00,:qa,oi.nextval)';
//*** Define Variable $objParse and $objExecute ***//
$objParse = oci_parse($conn, $strSQL);
oci_bind_by_name($objParse, ':nums', $oida);
oci_bind_by_name($objParse, ':qa', $qt);
$objExecute = oci_execute($objParse);
if($objExecute)
{
    oci_commit($conn); //*** Commit Transaction ***//
    echo "Save completed.";
    echo "ADDED Football TO CART";
   header("Location: restaurant.html");
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
}
else
{
	header("Location: Login1.html");
}
?>
<br>
<div>
<font size="2">Go To Home Page <a href="restaurant.html">click here</a></font>
</div>