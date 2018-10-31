<?php

if(isset($_COOKIE["login"])){
	setcookie('login',"", time()-200, "/");
}

if(isset($_COOKIE['password'])){
	setcookie('password',"", time()-200, "/");
}

header("Location: index.php");
?>