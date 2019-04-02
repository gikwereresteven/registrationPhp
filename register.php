<?php
//getting user values
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$talkid=$_POST['talkid'];
	$gender=$_POST['gender'];
	$borndate=$_POST['borndate'];
	$password=$_POST['password'];
	$confpassword=$_POST['confpassword'];
	
//array of responses
$output=array();

//require database
require_once('db.php');

//checking if email exists
$conn=$dbh--->prepare('SELECT email FROM applicationtable WHERE email=?');
$conn-&gt;bindParam(1,$email);
$conn-&gt;execute();

//results
if($conn-&gt;rowCount() !==0){
$output['error'] = true;
$output['message'] = "Email Exists Please Login";
}else{

$conn=$dbh-&gt;prepare('INSERT INTO applicationtable(firstname,lastname,email,talkid,gender,borndate,password,confpassword) VALUES (?,?,?,?,?,?,?,?)');
//encrypting the password
$pass=md5($password);
if ($password != $confpassword) {
	$output['error'] = false;
$output['message'] = "passwords doesn't match";
$output['password']=$pass;
	# code...
}
$conn-&gt;bindParam(1,$firstname);
$conn-&gt;bindParam(2,$lastname);
$conn-&gt;bindParam(3,$email);
$conn-&gt;bindParam(4,$talkid);
$conn-&gt;bindParam(5,$gender);
$conn-&gt;bindParam(6,$borndate);
$conn-&gt;bindParam(7,$password);
//$conn-&gt;bindParam(8,$confpassword);


$conn-&gt;execute();
if($conn-&gt;rowCount() == 0)
{
$output['error'] = true;
$output['message'] = "Registration failed, Please try again";
}
elseif($conn-&gt;rowCount() !==0){
$output['error'] = false;
$output['message'] = "Succefully Registered";
$output['email']=$email;
}
}
echo json_encode($output);

?&gt;

