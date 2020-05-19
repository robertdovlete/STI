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
 
// $qt = $_POST['qt'];

/*$name=$_POST['name'];
$addr=$_POST['addr'];


$sql = 'INSERT INTO Customer(CUSTOMERID,CUSTOMERNAME,PHONE) '.
       'VALUES(1, :uname, :uaddr)';

$compiled = oci_parse($conn, $sql);

oci_bind_by_name($compiled, ':uname', $name);
oci_bind_by_name($compiled, ':uaddr', $addr);

oci_execute($compiled);
*/
$sql='select quantity from orderitem where (orderid,ordernum)in ( select orderid, min(ordernum) from orderitem where orderid= :nums group by orderid) ';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($objParse, ':nums', $oida);
oci_execute($stid);
if($objExecute)
{
while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    // Use the uppercase column names for the associative array indices
                   $row[0];
               
               }
    oci_commit($conn);
}}
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
echo "submit issue"
}
else
{
//	header("Location: Login1.html");
  echo "session issue";
}
?>
<br>
<div>
<font size="2">Go To Home Page <a href="restaurant.html">click here</a></font>
</div>