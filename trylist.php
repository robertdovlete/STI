<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Virtual Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.html">Virtual Store</a></div>
          <div class="col-6 col-lg-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li><a href="index.html">Home</a></li>
                         <li><a href="customer.html">Sign Up</a></li>
                        <li><a href="Login1.html">Log In</a></li>
                        <li><a href="restaurant.html">Products</a></li>
                        <li class="active"><a href="trylist.php">Cart</a></li>
                        <li><a href="logouthere.php">Log Out</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Cart</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Cart</li>
            </ul>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->
  
  <section class="section bg-image overlay" style="background-image: url('images/hero_3.jpg');">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading text-white" data-aos="fade">Your Cart</h2>
            <p class="text-white" data-aos="fade" data-aos-delay="100">Feel Free To Add Or Remove Anything From Cart</p>
            <form action="foodcalculate.php" method="post">
              <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Click Here To Refresh Food Cart For First Time</button>
            </form>
            <br/>
            <form action="electronicscalculate.php" method="post">
              <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Click Here To Refresh Electronics Cart For First Time</button>
            </form>
            <br/>
            <form action="sportscalculate.php" method="post">
              <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Click Here To Refresh Sports Cart For First Time</button>
            </form>
            <br/>
          </div>
        </div>
        <div class="food-menu-tabs" data-aos="fade">
          <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active letter-spacing-2" id="mains-tab" data-toggle="tab" href="#mains" role="tab" aria-controls="mains" aria-selected="true">Food</a>
            </li>
            <li class="nav-item">
              <a class="nav-link letter-spacing-2" id="desserts-tab" data-toggle="tab" href="#desserts" role="tab" aria-controls="desserts" aria-selected="false">Electronics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link letter-spacing-2" id="drinks-tab" data-toggle="tab" href="#drinks" role="tab" aria-controls="drinks" aria-selected="false">Sports</a>
            </li>
          </ul>
          <div class="tab-content py-5" id="myTabContent">
            
            
            <div class="tab-pane fade show active text-left" id="mains" role="tabpanel" aria-labelledby="mains-tab">
              <div class="row">
                <div class="col-md-6">
                  <div class="food-menu mb-5">
            <br/>
                    <h3 class="text-white"><a href="#" class="text-white">Apples</a></h3>
      <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
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
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =1';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Apple</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               }
               echo "</table>";
    oci_commit($conn);

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
<br/>
                     <form action="removeapple.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">Tomatos</a></h3>
      <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
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
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =2';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Tomato</td>
                       <td>'.$row[0].'</td>
                       </tr>';
             
               }
               echo "</table>";
    oci_commit($conn);
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
<br/>
                     <form action="removetomato.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">Beef</a></h3>
                    <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
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
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =3';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
$x=0;
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Beef</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               
               }
               echo "</table>";
    oci_commit($conn);
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removebeef.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">Chicken</a></h3>
                    <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
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
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =4';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
$x=0;
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Chicken</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               
               }
               echo "</table>";
    oci_commit($conn);
    //oci_free_statement($objExecute);
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removechicken.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">Ketchup</a></h3>
                    <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
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
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =5';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
$x=0;
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Ketchup</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               
               }
               echo "</table>";
    oci_commit($conn);
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removeketchup.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">Popcorn</a></h3>
                      <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");

$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =6';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
$x=0;
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Popcorn</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               
               }
               echo "</table>";
    oci_commit($conn);
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removepopcorn.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                </div>
              </div>
              

            </div> <!-- .tab-pane -->

            <div class="tab-pane fade text-left" id="desserts" role="tabpanel" aria-labelledby="desserts-tab">
              <div class="row">
                <div class="col-md-6">
                  <div class="food-menu mb-5">
                     <h3 class="text-white"><a href="#" class="text-white">Iphone</a></h3>
      <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =7';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Iphone</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               }
               echo "</table>";
    oci_commit($conn);

}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removeiphone.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">RogLaptop</a></h3>
      <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =8';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>RogLaptop</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               }
               echo "</table>";
    oci_commit($conn);

}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removelaptop.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">Airdots</a></h3>
      <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =9';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Airdots</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               }
               echo "</table>";
    oci_commit($conn);

}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removeairdots.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                </div>
              </div>
            </div> <!-- .tab-pane -->
            
            <div class="tab-pane fade text-left" id="drinks" role="tabpanel" aria-labelledby="drinks-tab">
              <div class="row">
                <div class="col-md-6">
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">Football</a></h3>
      <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =10';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Football</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               }
               echo "</table>";
    oci_commit($conn);

}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removefootball.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">Cricket Bat</a></h3>
      <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =11';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Bats</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               }
               echo "</table>";
    oci_commit($conn);

}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removebat.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                  <div class="food-menu mb-5">
                      <h3 class="text-white"><a href="#" class="text-white">Tennis Ball</a></h3>
      <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 
$sql='SELECT totalquantity '.
'from foodqt '.
'where orderid = :da AND productid =12';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Tennis Ball</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               }
               echo "</table>";
    oci_commit($conn);

}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
                     <form action="removeball.php" method="post">
                      <label for="name" >Update Quantity: </label>
      <input type="number" class="form-control" required="required" id="name" placeholder="Enter Quantity" name="qt">
      <br/>
                    <button type="submit" value="Submit" id = "submit" name="submit" class="btn btn-default">Update</button>

                  </form>
                  <br/>
</div>
                  </div>
                </div>
              </div>
            </div> <!-- .tab-pane -->
          </div>
        </div>
      </div>
    </section>

    <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
                  <div class="food-menu mb-5">
                    <h3 class="text-white"><a href="#" class="text-white">Grand Total</a></h3>
                    <div style="color: white;" class="content">
            <?php
if (isset($_SESSION['user']))
{

$conn=oci_connect("SYSTEM","robert","localhost/XE");
 

$sql='SELECT sum(totalquantity*unitprice)'.
' from foodqt where orderid= :da ';
$cida=$_SESSION['user'];
$oida=$_SESSION['orderid'];
$stid = oci_parse($conn,$sql) ;
oci_bind_by_name($stid, ':da', $oida);
$objExecute=oci_execute($stid);
$x=0;
if($objExecute)
{echo "
               <table class='table'>
               <tr><br/><h1><strong></strong></h1></tr>";

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  

    // Use the uppercase column names for the associative array indices
                   echo 
                       '<tr>
                       <td>Grant Total</td>
                       <td>'.$row[0].'</td>
                       </tr>';
               
               }
               echo "</table>";
    oci_commit($conn);
}
else
{
    oci_rollback($conn); //*** RollBack Transaction ***//
    $m = oci_error($objParse); 
    echo "Error Save [".$m['message']."]";
}

oci_close($conn);
}
else
{
  header("Location: Login1.html");
}
?>
<br/>
</div>
</div>
              <h2 class="text-white font-weight-bold">All Done?</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="#" class="btn btn-outline-white-primary py-3 text-white px-5">Check Out</a>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="logouthere.php" class="btn btn-outline-white-primary py-3 text-white px-5">Log Out</a>
            </div>
          </div>
        </div>
      </section>

    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
             <li><a href="restaurant.html">Products</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="Login1.html">Log In</a></li>
              <li><a href="customer.html">Sign Up</a></li>
            </ul>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> virtualstore.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-vimeo"></span></a>
          </p>
        </div>
      </div>
    </footer>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 
    <script src="js/main.js"></script>
    <script>
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
  </script>
  </body>
</html>