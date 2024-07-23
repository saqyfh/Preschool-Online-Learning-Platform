<?php
include("dbconn.php");

	$c_id = $_REQUEST['custID'];
	$c_pass = $_REQUEST['cust_password'];
	$c_fn = $_REQUEST['cust_firstname'];
	$c_ln = $_REQUEST['cust_lastname'];
	$c_phone = $_REQUEST['cust_phonenum'];
	$c_age = $_REQUEST['cust_age'];
	$c_gender = $_REQUEST['cust_gender'];
	$c_email = $_REQUEST['cust_email'];

	$sqlInsert = "INSERT INTO customer VALUES
	('" . $c_id . "','" . $c_pass. "',
	'" . $c_fn . "','" . $c_ln . "','" . $c_phone . "', " . $c_age. ", '" . $c_gender . "', '" . $c_email . "')";

mysqli_query($dbconn, $sqlInsert) or die ("Error: " . mysqli_error($dbconn));
echo "The following information have been recorded in the DB";
echo "<br>Customer ID : " .$c_id;
echo "<br>Customer Password: " .$c_pass;
echo "<br>Customer First Name : " .$c_fn;
echo "<br>Customer Last Name : " .$c_ln;
echo "<br>Customer Phone Number : " .$c_phone;
echo "<br>Customer Age : " .$c_age;
echo "<br>Customer Gender : " .$c_gender;
echo "<br>Customer Email : " .$c_email;
echo"<br><a href='viewCustDetailsInfo.php'>Main page</a>";
?>