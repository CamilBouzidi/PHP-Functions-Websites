<html>
 <head>
  <title>Assignment 4 Question 2</title>
 </head>
 <body>
	<h1>Assignment 4, Question 2 by Camil Bouzidi<br/></h1>
 </body>
</html>
<?php
date_default_timezone_set('EST');
$count=0;
if (!isset($_COOKIE["numOfVisits"])){
    $_COOKIE["numOfVisits"]=1;//Creating the variable
}
$count=$_COOKIE["numOfVisits"]+1;//Actualizing the variable
setcookie("numOfVisits", $count, time()+3600);//Creating the cookie
if (!isset($_COOKIE["last"]))
    $_COOKIE["last"]=null;//Doing this to avoid any problems later on if the cookie is not set
setcookie("last",date("D F j G:i:s "),time()+3600);//Creating the cookie
if ($_COOKIE["numOfVisits"]==1)
    echo "Welcome to my webpage! This is your first time coming here!";
else{
    echo "Hello, this is the ".$_COOKIE["numOfVisits"]." time that you are visiting my webpage.<br/>";
    echo "Last visit: ".$_COOKIE["last"]."EST";
}
?>