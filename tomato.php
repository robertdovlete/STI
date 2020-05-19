<?php
session_start();
if (isset($_SESSION['user']))
{
	if (isset($_POST['log'])) {
$conn=oci_connect("SYSTEM","robert","localhost/XE");
    If (!$conn)
        echo 'Failed to connect to Oracle';
    else
        echo 'Succesfully connected with Oracle DB';
 
$qt1 = $_POST['qat'];
$oida1=$_SESSION['orderid'];
$strSQL = 'INSERT INTO ORDERITEM(ORDERID,PRODUCTID,UNITPRICE,QUANTITY,ORDERNUM) '.
          'VALUES(:numss,2,4.00,:qam,oi.nextval)';
//*** Define Variable $objParse and $objExecute ***//
$objParse = oci_parse($conn, $strSQL);
oci_bind_by_name($objParse, ':numss', $oida1);
oci_bind_by_name($objParse, ':qam', $qt1);
$objExecute = oci_execute($objParse);
if($objExecute)
{
    oci_commit($conn); //*** Commit Transaction ***//
    oci_free_statement($objExecute);
    echo "Save completed.";
    echo "ADDED Tomato TO CART";
  header("Location: restaurant.html");
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}
/*if($stmt = $mysqli->prepare("INSERT INTO customer(name,mobileno) VALUES (?,?)")){
$stmt->bind_param("ss", $name, $addr);
$stmt->execute();
}

if ($stmt = $mysqli->prepare("SELECT id FROM customer WHERE name=? and mobileno=?")) {

    /* bind parameters for markers */
  //  $stmt->bind_param("ss", $name, $addr);

    /* execute query */
    //$stmt->execute();

    /* bind result variables */
    //$stmt->bind_result($id);

    /* fetch value */
    //$stmt->fetch();

    //printf("%s registered your unique id is %d\n", $name, $id);
    /* close statement */
   // $stmt->close();
//}
oci_close($conn);
}
else
{
  echo "error";
}
}
/*$name=$_POST['name'];
$addr=$_POST['addr'];


$sql = 'INSERT INTO Customer(CUSTOMERID,CUSTOMERNAME,PHONE) '.
       'VALUES(1, :uname, :uaddr)';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':uname', $name);
oci_bind_by_name($compiled, ':uaddr', $addr);

oci_execute($compiled);
*/
else
{
	header("Location: Login1.html");
}
?>
<br>
<div>
<font size="2">Go To Home Page <a href="restaurant.html">click here</a></font>
</div>