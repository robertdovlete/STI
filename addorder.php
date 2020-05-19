<?php
session_start();
if (isset($_SESSION['user']))
{
$conn=oci_connect("SYSTEM","robert","localhost/XE");
    If (!$conn)
        echo 'Failed to connect to Oracle';
    else
        echo 'Succesfully connected with Oracle DB';
 


/*$name=$_POST['name'];
$addr=$_POST['addr'];


$sql = 'INSERT INTO Customer(CUSTOMERID,CUSTOMERNAME,PHONE) '.
       'VALUES(1, :uname, :uaddr)';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':uname', $name);
oci_bind_by_name($compiled, ':uaddr', $addr);

oci_execute($compiled);
*/
$cida=$_SESSION['user'];
$strSQL = 'INSERT INTO ORDERS(ORDERID,ORDERNUMBER,CUSTOMERID,ORDERDATES,TOTALAMOUNT) '.
          'VALUES(oid.nextval, 1, :num, DEFAULT, 0)';
//*** Define Variable $objParse and $objExecute ***//
$objParse = oci_parse($conn, $strSQL);
oci_bind_by_name($objParse, ':num', $cida);
$objExecute = oci_execute($objParse);
if($objExecute)
{
    oci_commit($conn);
    $sqlstm= "select ORDERID from orders order by orderdates DESC FETCH NEXT 1 ROWS ONLY";
    $res1 = oci_parse($conn,$sqlstm);
    oci_define_by_name($res1, 'ORDERID', $idss);
    oci_execute($res1);
    while(oci_fetch($res1))
    {
        for($x=1;$x<=ocinumcols($res1); $x++) 
         $od=ociresult($res1,$x);
    echo $od;
    $_SESSION['orderid']=$od; }
     //*** Commit Transaction ***/s/
    echo "Save completed.";
    echo "ADDED TO YOUR CART";
    //alert("ADDED");
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
	header("Location: Login1.html");
}
?>
<br>
<div>
<font size="2">Go To Home Page <a href="restaurant.html">click here</a></font>
</div>

