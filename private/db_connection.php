<?php 

/* Dev */
$servername = "localhost";
$username = "root";
$db_name = "modal_web";
$password = "MettezNous20";
$salt = "jadoeaiedhajeidaheu!aedayYRb";


try{
    $cnx = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch(PDOException $ex){
	$error = $ex->getMessage();
    echo json_decode($error);
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}

/*
class Database {
    public static function connect() {
        $dsn = 'mysql:dbname=fsdhfkjl;host=127.0.0.1';
        $user = 'root';
        $password = 'eau_de_feu';
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }
}
*/