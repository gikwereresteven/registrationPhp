 <php

try{
$host="mysql:host=localhost;dbname=applicationdb";
$user_name="root";
$user_password="";
$dbh=new PDO($host,$user_name,$user_password);
}

catch(Exception $e){
exit("Connection Error".$e--->getMessage());
}

?&gt;