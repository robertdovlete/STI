 <?php
 session_start();
if (isset($_SESSION['user']))
{
  if (isset($_POST['submit'])) {

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
$sql='SELECT sum(od.quantity) '.
'from product p, orderitem od, orders o, customers cw '.
'where o.customerid=cw.customerid AND od.orderid=o.orderid AND od.productid=p.productid AND cw.customerid= :nums AND o.orderid= :qa AND p.productid = 10';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':nums', $cida);
oci_bind_by_name($stid, ':qa', $oida);
$objExecute=oci_execute($stid);
$x=0;
if($objExecute)
{
while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                 $x=$row[0];
               }
    oci_commit($conn);

}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}
echo $x;
echo "   ";
echo $oida;
$strSQL = 'INSERT INTO foodqt(PRODUCTID,ORDERID,TOTALQUANTITY,UNITPRICE) '.
          'VALUES(10,:tew,:cals,13.00)';
//*** Define Variable $objParse and $objExecute ***//
$objParse = oci_parse($conn, $strSQL);
oci_bind_by_name($objParse, ':tew', $oida);
oci_bind_by_name($objParse, ':cals', $x);
$objExecute = oci_execute($objParse);
if($objExecute)
{
    oci_commit($conn); //*** Commit Transaction ***//
    //oci_free_statement($objExecute);
    echo "Save completed.";
    echo "ADDED Football TO CART";
  //header("Location: restaurant.html");
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}


// FOR TOMATO NOW


 
$sql='SELECT sum(od.quantity) '.
'from product p, orderitem od, orders o, customers cw '.
'where o.customerid=cw.customerid AND od.orderid=o.orderid AND od.productid=p.productid AND cw.customerid= :nums AND o.orderid= :qa AND p.productid = 11';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':nums', $cida);
oci_bind_by_name($stid, ':qa', $oida);
$objExecute=oci_execute($stid);
$x=0;
if($objExecute)
{
while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                 $x=$row[0];
               }
    oci_commit($conn);

}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}
echo $x;
echo "   ";
echo $oida;
$strSQL = 'INSERT INTO foodqt(PRODUCTID,ORDERID,TOTALQUANTITY,UNITPRICE) '.
          'VALUES(11,:tew,:cals,30.00)';
//*** Define Variable $objParse and $objExecute ***//
$objParse = oci_parse($conn, $strSQL);
oci_bind_by_name($objParse, ':tew', $oida);
oci_bind_by_name($objParse, ':cals', $x);
$objExecute = oci_execute($objParse);
if($objExecute)
{
    oci_commit($conn); //*** Commit Transaction ***//
    //oci_free_statement($objExecute);
    echo "Save completed.";
    echo "ADDED Bat TO CART";
  //header("Location: restaurant.html");
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}








// FOR BEEF




 
$sql='SELECT sum(od.quantity) '.
'from product p, orderitem od, orders o, customers cw '.
'where o.customerid=cw.customerid AND od.orderid=o.orderid AND od.productid=p.productid AND cw.customerid= :nums AND o.orderid= :qa AND p.productid = 12';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':nums', $cida);
oci_bind_by_name($stid, ':qa', $oida);
$objExecute=oci_execute($stid);
$x=0;
if($objExecute)
{
while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                 $x=$row[0];
               }
    oci_commit($conn);

}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}
echo $x;
echo "   ";
echo $oida;
$strSQL = 'INSERT INTO foodqt(PRODUCTID,ORDERID,TOTALQUANTITY,UNITPRICE) '.
          'VALUES(12,:tew,:cals,3.00)';
//*** Define Variable $objParse and $objExecute ***//
$objParse = oci_parse($conn, $strSQL);
oci_bind_by_name($objParse, ':tew', $oida);
oci_bind_by_name($objParse, ':cals', $x);
$objExecute = oci_execute($objParse);
if($objExecute)
{
    oci_commit($conn); //*** Commit Transaction ***//
    //oci_free_statement($objExecute);
    echo "Save completed.";
    echo "ADDED Balls TO CART";
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