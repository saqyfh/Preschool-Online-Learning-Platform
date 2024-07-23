<?php
include("dbconn.php");

	$a_id = $_REQUEST['adminID'];
	$a_pass = $_REQUEST['admin_password'];
	$a_fn = $_REQUEST['admin_firstname'];
	$a_ln = $_REQUEST['admin_lastname'];
	$a_phone = $_REQUEST['admin_phonenum'];
	$a_age = $_REQUEST['admin_age'];
	$a_gender = $_REQUEST['admin_gender'];
	$a_email = $_REQUEST['admin_email'];

	$sqlInsert = "INSERT INTO admin VALUES
	('" . $a_id . "','" . $a_pass. "',
	'" . $a_fn . "','" . $a_ln . "','" . $a_phone . "', " . $a_age. ", '" . $a_gender . "', '" . $a_email . "')";

mysqli_query($dbconn, $sqlInsert) or die ("Error: " . mysqli_error($dbconn));
echo "The following information have been recorded in the DB";
echo "<br>Admin ID : " .$a_id;
echo "<br>Admin Password: " .$a_pass;
echo "<br>Admin First Name : " .$a_fn;
echo "<br>Admin Last Name : " .$a_ln;
echo "<br>Admin Phone Number : " .$a_phone;
echo "<br>Admin Age : " .$a_age;
echo "<br>Admin Gender : " .$a_gender;
echo "<br>Admin Email : " .$a_email;
echo"<br><a href='viewAdminDetailsInfo.php'>Main page</a>";
?>