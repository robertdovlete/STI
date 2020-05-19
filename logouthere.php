<?php
 session_start();
if (isset($_SESSION['user']))
{
	$_SESSION['user']=0;
	$_SESSION['orderid']=0;
header("Location: index.html");
}
else
{
	echo "error";
}