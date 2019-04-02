<?php

//getting user values
$email=$_POST['email'];
$password=$_POST['password'];

//an array of response
$output = array();

//requires database connection
require_once('db.php');

//checking if email exit
$conn=$dbh--->prepare("SELECT * FROM applicationtable WHERE email=? and password=?");
$pass=md5($password);
$conn-&gt;bindParam(1,$email);
$conn-&gt;bindParam(2,$pass);
$conn-&gt;execute();
if($conn-&gt;rowCount() == 0){
$output['error'] = true;
$output['message'] = "Wrong Email or Password";
}

//checking password correctness
if($conn-&gt;rowCount() !==0){
$results=$conn-&gt;fetch(PDO::FETCH_OBJ);
//we get both the username and password
$email=$results-&gt;email;
$correctpass=$results-&gt;password;

$output['error'] = false;
$output['message'] = "login sucessful";
$output['email'] = $email;

}
echo json_encode($output);

?&gt;